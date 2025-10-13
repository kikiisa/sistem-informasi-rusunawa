<?php

 namespace App\Services;

use App\Models\Notifications;
use Illuminate\Support\Facades\Notification;

 class NotificationServices
 {
    public function sendNotification($user, $judul, $isi)
    {
        $notif = Notifications::create([
            'user_id' => $user,
            'judul' => $judul,
            'isi' => $isi,
        ]);
        return $notif;
    }
 }