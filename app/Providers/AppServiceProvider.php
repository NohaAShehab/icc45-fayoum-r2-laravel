<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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

    /// customize which middleware to stop ??
    public function boot(): void
    {
        //
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        # 1- define gate
        Gate::define('delete-employee', function (User $user, Employee $employee) {
            return $user->id === $employee->creator_id;
        });
        Gate::define('update-employee', function (User $user, Employee $employee) {
            return $user->id === $employee->creator_id;
        });
    }


}
