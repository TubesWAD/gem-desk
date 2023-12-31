<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
<<<<<<< HEAD
//use Illuminate\Support\Facades\schema;
=======
use Illuminate\Support\Facades\Blade;
>>>>>>> origin


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
<<<<<<< HEAD
        //Schema::defaultStringLenght(191);
=======
        Blade::directive('role', function ($roles){
            return "<?php if(auth()->check() && auth()->user()->roles === $roles): ?>";
        });

        Blade::directive('endrole', function (){
            return '<?php endif; ?>';
        });
>>>>>>> origin
    Paginator::useBootstrap();
    }
}
