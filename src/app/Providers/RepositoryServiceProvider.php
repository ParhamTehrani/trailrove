<?php

namespace App\Providers;

use App\Repository\AdminRepository;
use App\Repository\AdminRepositoryInterface;
use App\Repository\AnswerRepository;
use App\Repository\AnswerRepositoryInterface;
use App\Repository\BaseRepository;
use App\Repository\BaseRepositoryInterface;
use App\Repository\CategoryRepository;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\CommentRepository;
use App\Repository\CommentRepositoryInterface;
use App\Repository\ContactUsRepository;
use App\Repository\ContactUsRepositoryInterface;
use App\Repository\ExamRepository;
use App\Repository\ExamRepositoryInterface;
use App\Repository\GalleryRepository;
use App\Repository\GalleryRepositoryInterface;
use App\Repository\LogRepository;
use App\Repository\LogRepositoryInterface;
use App\Repository\MenuRepository;
use App\Repository\MenuRepositoryInterface;
use App\Repository\NewsRepository;
use App\Repository\NewsRepositoryInterface;
use App\Repository\PageRepository;
use App\Repository\PageRepositoryInterface;
use App\Repository\PermissionCategoryRepository;
use App\Repository\PermissionCategoryRepositoryInterface;
use App\Repository\PermissionRepository;
use App\Repository\PermissionRepositoryInterface;
use App\Repository\QuestionRepository;
use App\Repository\QuestionRepositoryInterface;
use App\Repository\RoleRepository;
use App\Repository\RoleRepositoryInterface;
use App\Repository\SliderRepository;
use App\Repository\SliderRepositoryInterface;
use App\Repository\UserAnswerRepository;
use App\Repository\UserAnswerRepositoryInterface;
use App\Repository\UserRepository;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(BaseRepositoryInterface::class,BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->bind(AdminRepositoryInterface::class,AdminRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(PermissionCategoryRepositoryInterface::class,PermissionCategoryRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class,PermissionRepository::class);
        $this->app->bind(LogRepositoryInterface::class,LogRepository::class);
        $this->app->bind(PageRepositoryInterface::class,PageRepository::class);
        $this->app->bind(MenuRepositoryInterface::class,MenuRepository::class);
        $this->app->bind(ContactUsRepositoryInterface::class,ContactUsRepository::class);
        $this->app->bind(NewsRepositoryInterface::class,NewsRepository::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentRepository::class);
        $this->app->bind(SliderRepositoryInterface::class,SliderRepository::class);
        $this->app->bind(GalleryRepositoryInterface::class,GalleryRepository::class);

    }
}
