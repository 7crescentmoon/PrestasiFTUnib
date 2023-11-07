<?php

namespace App\Providers;

use App\Models\Pengajuan;
use Illuminate\Support\ServiceProvider;
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
        View::composer('partials.sidebar', function ($view) {
            $jumlah_pengajuan = Pengajuan::where('status', 0 )->count(); // Ganti dengan metode atau logika bisnis yang sesuai
            $view->with('jumlah_pengajuan', $jumlah_pengajuan);
        });
    }
}
