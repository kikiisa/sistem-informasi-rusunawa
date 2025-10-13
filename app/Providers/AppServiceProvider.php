<?php

namespace App\Providers;

use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

        
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        

        View::composer('layouts.users', function ($view) {
            $view->with('notifictions',Notifications::all()->where('user_id',Auth::user()->id)->where('status','pending'));
        });
    }
}
