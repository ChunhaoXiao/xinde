<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ContentType;
use App\Models\Category;
use Illuminate\Support\Facades\View;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.column.create', function($view) {
            $view->with('categories', Category::top()->pluck('name', 'id'));
            $view->with('content_types', ContentType::pluck('name', 'id'));
        });

        View::composer('components.categorytree', function($view) {
            $view->with('options', Category::with('subcates')->get());
        });

        // View::composer('components.articlesearch', function($view){
        //     $view->with('source', )
        // });
    }
}
