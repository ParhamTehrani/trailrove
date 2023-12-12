<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Config;
use App\Models\Menu;
use App\Models\News;
use App\Models\Slider;
use App\Models\Tag;
use App\Repository\CategoryRepository;
use App\Repository\MenuRepository;
use App\Repository\NewsRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;


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
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        Collection::macro('paginate', function($perPage, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage), // $items
                $this->count(),                  // $total
                $perPage,
                $page,
                [                                // $options
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });

        View::composer('layouts.front', function ($view) {
            $recentNews = (new NewsRepository(new News()))->getLatestPublish(3);
            $view->with('recentNews', $recentNews);

            $categories = (new CategoryRepository(new Category()))->getParentCategories();
            $view->with('categories', $categories);

            $menu = (new MenuRepository(new Menu()))->getActiveSlugs();
            $view->with('menu', $menu);

            $popular = (new NewsRepository(new News()))->getMostPublish(3);
            $view->with('popular', $popular);

            $sliders = Slider::where('active',true)->first();
            $view->with('sliders', $sliders);

        });

    }
}
