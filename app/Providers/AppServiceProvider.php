<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ChuyenMuc;

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
        View::composer('*', function ($view) {
            $chuyenmuc = ChuyenMuc::with('loaiTin')->get(); // Lấy tất cả chuyên mục
            $view->with('chuyenmuc', $chuyenmuc); // Chia sẻ biến $chuyenmuc với tất cả các view
        });
    }
}
