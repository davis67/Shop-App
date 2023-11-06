<?php

namespace App\Providers;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
 use Illuminate\Support\Facades\Gate;
 use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Model::unguard();
        
    
            Gate::define('admin', function (User $user) {
                return $user->username === 'Rwamutwe';
            });
    
            Blade::if('admin', function () {
                return request()->user()?->can('admin');
            });
        }
    }

