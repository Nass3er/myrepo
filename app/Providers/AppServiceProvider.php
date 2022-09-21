<?php

namespace App\Providers;

use Illuminate\Pagination\paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Project;
use App\Models\Blog;
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
           Paginator::useBootstrap();
        view()->share('allprojects', Project::paginate(2));
        view()->share('allblogs', Blog::all());
    }
}
