<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Services\FonteServices;
use App\Services\NotificationServices;
use Illuminate\Http\Request;

class WhatsappsController extends Controller
{
    private $fonteServices;
    private $notif;
    public function __construct(FonteServices $fonteServices)
    {
        $this->fonteServices = $fonteServices;
        $this->notif = new NotificationServices();
    }
    public function sendWhatsapps(Request $request)
    {
        $data = Order::with(["kamar","user"])->where("id",$request->id)->first();
        
        $expired = expired($data->tanggal_order,$data->waktu_berakhir);
        
        $pesan = "Nama : {$data->user->name} \nNo Kamar : {$data->kamar->no_kamar} \nTanggal Kontrak : {$data->tanggal_order} \n Berakhir Kontrak / Jatuh Tempo : {$expired} Hari";
        $this->notif->sendNotification($data->user->id, "Kontrak", $pesan   );
        try {
            $curl = curl_init();
            $token = "7x7sn5avNVHoKGGV1ZsU";
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $data->user->phone,
                    'message' => $pesan,
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    "Authorization: $token"
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            return back()->with("success","Berhasil Di Kirim");
        } catch (\Throwable $th) {
            return back()->with("error","Gagal Di Kirim");
        }

    }
}
