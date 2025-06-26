<?php

namespace App\Console\Commands;

use App\Models\Kamar;
use App\Models\Order;
use App\Services\FonteServices;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class NotificationOrder extends Command
{

    public $fonteServices;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       
        Kamar::create([
            "uuid" => Uuid::uuid4()->toString(),
            "no_kamar" => "123222",
            "lt_kamar" => "1222",
            "status" => "tersedia",
            "harga" => "1000000",
            "fasilitas" => "AC, TV, Kulkas",
        ]);
        
        // $this->fonteServices = new FonteServices();
        // $data = Order::with(["kamar", "user"])->get();
        // foreach ($data as $item) {
        //     $expired = expired($item->tanggal_order, $item->waktu_berakhir);
        //     $pesan = "Nama : {$item->user->name} \nNo Kamar : {$item->kamar->no_kamar} \nTanggal Kontrak : {$item->tanggal_order} \n Berakhir Kontrak : {$expired}";
        //     $this->fonteServices->sendNotification($pesan, $item->user->phone);
        // }
    }
}
