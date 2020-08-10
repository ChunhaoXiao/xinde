<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use App\Models\ArticleComment;
use App\Policies\ArticleCommentPolicy;
use App\Policies\CartPolicy;
use App\Models\Cart;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        ArticleComment::class => ArticleCommentPolicy::class,
        Cart::class => CartPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies(); 
        Passport::routes();

        // Passport::personalAccessClientId(
        //     config('passport.personal_access_client.id')
        // );
    
        // Passport::personalAccessClientSecret(
        //     config('passport.personal_access_client.secret')
        // );
    }
}
