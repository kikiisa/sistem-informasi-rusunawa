<?php

namespace App\Http\Controllers;

use App\Models\BerkasUser;
use App\Models\Kamar;
use App\Models\Order;
use App\Models\PerizinanFile;
use Illuminate\Http\Request;
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
        $perizinan = PerizinanFile::all()->count();
        $dataApproved = ($validasiBerkas->where("status", "approved")->count());
        if ($dataApproved == $perizinan) {
            $data = Kamar::find($id);
            return view("member.kontrak.detail", compact("data"));
        }
        return redirect()->route("berkas.index")->with("info", "Lengkapi Data Perizinan Terlebih Dahulu");
    }

    public function store(Request $request)
    {
        if (Order::where("user_id", Auth::user()->id)->exists()) {
            return redirect()->route("management-kontrak.index")->with("error", "Anda Sudah Mengajukan Kontrak");
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
