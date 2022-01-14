<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Polices\PostPolicy;
use App\Post;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        
        $this->registerPolicies();
       
        // Gate::define('post.update',function($user,$post){
        //     if($user->id=== $post->user_id)
        //     return true;
        // });
        Gate::define('post.delete',function(){   
                return true;
            
            
        });

        //
    }
}
