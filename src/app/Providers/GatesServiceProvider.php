<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class GatesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('permissions'))
        {
            foreach ($this->getPermissions() as $permission) {
                Gate::define($permission->name_en, function ($admin) use ($permission) {
                    return $admin->roleHasPermission($permission->name_en);
                });
            }
        }

    }

    public function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
