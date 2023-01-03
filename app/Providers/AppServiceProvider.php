<?php

namespace App\Providers;

use App\Http\Controllers\StudentsController;
use App\Models\Students;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //pwedi di maka call data base
        // dire pwedi makabutang data kag i sulod sa variable para magamit sang iban man nga file (bale global variable sya nga pwedi mo ma call sa biskan diin nga file)
         View::share('title', 'Student Admin'); //dire gin kwa ang title nga variable sang sa header

        // View::composer('students.index', function($view) {
        //     $view->with('students', Students::all());
        // });
    }
}
