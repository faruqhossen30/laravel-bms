<?php

namespace App\Providers;

use App\Models\Basic;
use App\Models\User;
use App\Models\Alart;
use App\Models\Gateway;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
            return base_path();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {  
        Schema::defaultStringLength(550);
        $bs = Basic::find(1);
        $clubs = User::where('is_club',1)->orderBy('balance','DESC')->get();
        $bkash = Gateway::where('method', 'bKash')->first();
        View::share(['bs' => $bs, 'clubs' => $clubs, 'bkash' => $bkash]);
    }
}
