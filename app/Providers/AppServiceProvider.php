<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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

        Paginator::defaultView('vendor.pagination.bootstrap-5');

        View::composer('partials.sidebar', function ($view) {
            $jumlah_pengajuan = Pengajuan::where('status', 0)->count(); // Ganti dengan metode atau logika bisnis yang sesuai
            $view->with('jumlah_pengajuan', $jumlah_pengajuan);
        });

        View::composer('partials.navbar', function ($view) {
            $carbon = Carbon::now('Asia/Jakarta'); // Ganti dengan metode atau logika bisnis yang sesuai
            $view->with('carbon', $carbon);
        });

    }


}
