<?php

namespace App\Providers;

use App\Business\Admin\AdminService;
use App\Business\Admin\AdminServiceInterface;
use App\Business\Admin\AuthenticationService;
use App\Business\Admin\AuthenticationServiceInterface;
use App\Business\Admin\CategoryService;
use App\Business\Admin\CategoryServiceInterface;
use App\Business\Admin\CommentService;
use App\Business\Admin\CommentServiceInterface;
use App\Business\Admin\ContactUsService;
use App\Business\Admin\ContactUsServiceInterface;
use App\Business\Admin\ExamService;
use App\Business\Admin\ExamServiceInterface;
use App\Business\Admin\GalleryService;
use App\Business\Admin\GalleryServiceInterface;
use App\Business\Admin\LogService;
use App\Business\Admin\LogServiceInterface;
use App\Business\Admin\MenuService;
use App\Business\Admin\MenuServiceInterface;
use App\Business\Admin\NewsService;
use App\Business\Admin\NewsServiceInterface;
use App\Business\Admin\PageService;
use App\Business\Admin\PageServiceInterface;
use App\Business\Admin\PermissionCategoryService;
use App\Business\Admin\PermissionCategoryServiceInterface;
use App\Business\Admin\PermissionService;
use App\Business\Admin\PermissionServiceInterface;
use App\Business\Admin\QuestionService;
use App\Business\Admin\QuestionServiceInterface;
use App\Business\Admin\RoleService;
use App\Business\Admin\RoleServiceInterface;
use App\Business\Admin\SliderService;
use App\Business\Admin\SliderServiceInterface;
use App\Business\Admin\UserService;
use App\Business\Admin\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class BusinessLayerAdminServiceProvider extends ServiceProvider
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
        $this->app->bind(AuthenticationServiceInterface::class,AuthenticationService::class);
        $this->app->bind(AdminServiceInterface::class,AdminService::class);
        $this->app->bind(RoleServiceInterface::class,RoleService::class);
        $this->app->bind(LogServiceInterface::class,LogService::class);
        $this->app->bind(CategoryServiceInterface::class,CategoryService::class);
        $this->app->bind(UserServiceInterface::class,UserService::class);
        $this->app->bind(PageServiceInterface::class,PageService::class);
        $this->app->bind(MenuServiceInterface::class,MenuService::class);
        $this->app->bind(ContactUsServiceInterface::class,ContactUsService::class);
        $this->app->bind(NewsServiceInterface::class,NewsService::class);
        $this->app->bind(CommentServiceInterface::class,CommentService::class);
        $this->app->bind(SliderServiceInterface::class,SliderService::class);
        $this->app->bind(GalleryServiceInterface::class,GalleryService::class);

    }
}
