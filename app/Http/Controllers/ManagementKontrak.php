<?php

namespace App\Http\Controllers;

use App\Models\ApprovedBerkas;
use App\Models\BerkasUser;
use App\Models\Kamar;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PerizinanFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Ramsey\Uuid\Uuid;

class ManagementKontrak extends Controller
{

    private $path = "data/transaksi/";
    /**
     * Show the list of rooms
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kamar::all();
        return view('member.kontrak.index', compact("data"));
    }

    public function show($id)
    {
        $validasiBerkas = collect(BerkasUser::where("id_user", Auth::user()->id)->get());
        $statusApproved = ApprovedBerkas::where("id_user", Auth::user()->id)->first();
        $dataPayment = Payment::all();
        $perizinan = PerizinanFile::all()->count();
        $dataApproved = ($validasiBerkas->where("status", "approved")->count());

        if ($dataApproved != $perizinan) {
            return redirect()->route("berkas.index")->with("info", "Lengkapi Data Perizinan Terlebih Dahulu");
        }


        if ($statusApproved->status == "rejected") {
            return redirect()->route("berkas.index")->with("error", "Anda Belum dapa melanjutkan Pengajuan Kontrak");
        }

        $data = Kamar::find($id);
        return view("member.kontrak.detail", [
            "data" => $data,
            "dataPayment" => $dataPayment
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            "masa_kontrak" => "required",
        ],[
            "masa_kontrak.required" => "Masa Kontrak Harus Diisi",
        ]);

        $checkOrder = Order::where("user_id", Auth::user()->id);
        $checkStatusApprovedBerkas = ApprovedBerkas::where("id_user", Auth::user()->id)->first();

        if($checkStatusApprovedBerkas->status == "rejected"){
            return redirect()->route("berkas.index")->with("error", "Status Berkas Anda Ditolak, Silahkan Lengkapi Berkas Anda");
        }


        // jika order masih ada
        if ($checkOrder->exists()) {
            $getCheckOrder = $checkOrder->first();
            if (expired($getCheckOrder->tanggal_order, $getCheckOrder->waktu_berakhir) > 0) {
                return redirect()->route("management-kontrak.index")->with("error", "Anda Sudah Mengajukan Kontrak");
            }
        }
        // jika kamar ada yang pesan
        $cekkamar = Order::where("kamar_id", $request->id_kamar)->first();
        if ($cekkamar) {
            // dd(expired($cekkamar->tanggal_order,$cekkamar->waktu_berakhir));
            if (expired($cekkamar->tanggal_order, $cekkamar->waktu_berakhir) != 0) {
                return redirect()->route("management-kontrak.index")->with("error", "Kamar Sudah Di Pesan");
            }
        }
        if ($request->hasFile("bukti_pembayaran")) {
            $request->validate([

                "bukti_pembayaran" => "required|image|mimes:jpeg,png,jpg|max:2048",
            ], [
                "bukti_pembayaran.required" => "Bukti Pembayaran Wajib Di
            Isi",
                "bukti_pembayaran.image" => "Bukti Pembayaran Harus Berupa
            Gambar",
                "bukti_pembayaran.mimes" => "Bukti Pembayaran Harus Berupa
            Gambar",
                "bukti_pembayaran.max" => "Ukuran File Maksimal 2MB !",
              
            ]);
            $files = $request->file("bukti_pembayaran");
            $nameFiles = $files->hashName();
            $files->move($this->path, $nameFiles);
            Order::create([
                "uuid" => Uuid::uuid4()->toString(),
                "user_id" => Auth::user()->id,
                "kamar_id" => $request->id_kamar,
                "waktu_kontrak" => $request->masa_kontrak,
                "file" => $nameFiles,
            ]);
            Kamar::where("id", $request->id_kamar)->update([
                "status" => "tidak_tersedia",
            ]);
            return redirect()->route("management-kontrak.index")->with("info", "Kontrak Berhasil Dibuat");
        } else {
            Order::create([
                "uuid" => Uuid::uuid4()->toString(),
                "user_id" => Auth::user()->id,
                "kamar_id" => $request->id_kamar,
                "waktu_kontrak" => $request->masa_kontrak,

            ]);
            return redirect()->route("management-kontrak.index")->with("info", "Kontrak Berhasil Dibuat");
        }
    }
}
