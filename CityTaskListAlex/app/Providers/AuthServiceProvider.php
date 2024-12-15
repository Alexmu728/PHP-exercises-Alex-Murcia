<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\Subject;
use App\Policies\SubjectPolicy;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    
        Gate::define('create-subject', [SubjectPolicy::class, 'create']);
        Gate::define('update-subject', [SubjectPolicy::class, 'update']);
        Gate::define('delete-subject', [SubjectPolicy::class, 'delete']);
    }
    
    protected $policies = [
        Subject::class => SubjectPolicy::class,
    ];
    
}
