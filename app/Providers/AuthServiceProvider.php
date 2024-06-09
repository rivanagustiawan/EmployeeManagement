<?php


namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User; // Pastikan ini diimpor dengan benar

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Register your model policies here
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update', function(User $user){
            if($user->role === 'super-admin' || $user->role === 'admin'  ){
                return true;
            }
        });

        Gate::define('delete', function(User $user){
            if($user->role === 'super-admin'){
                return true;
            }
        });
    }
}
