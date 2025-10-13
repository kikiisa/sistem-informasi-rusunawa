<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function delete(Request $request)
    {
        $data = Notifications::where('user_id', auth()->id())->get();

        if ($data->isEmpty()) {
            return back()->with('error', 'Tidak ada notifikasi untuk dihapus');
        }

        $data->each->delete();

        return back()->with('success', 'Semua notifikasi berhasil dihapus');

    }

}
