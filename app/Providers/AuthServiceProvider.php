<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
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
        /*
         * we can use before code for granting admin user,
         */
        Gate::before(function ($userinf, $ability, $params){
//            dd($userinf, $ability, $params);
            if($userinf->id===1){
                return true;
            }
        });
        Gate::after(function ($userinf,$ability,$result,$params){
            dd($userinf,$ability,$result,$params);
        });
        Gate::define('Post-Update',function ($userinf,$postinf){
            dd('Execute after before block code');
            if($userinf->id===1){return true;}
            return $userinf->id===$postinf->user_id;
        });

        //
    }
}
