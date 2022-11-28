<?php

namespace Tests\Browser;

use App\Models\admin_user;
use App\Models\login_user;
use App\Models\login_user_admin;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use phpDocumentor\Reflection\Type;
use Tests\Browser\Pages\LoginPage;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLoginForm()
    {
        $this->withoutExceptionHandling();
        $this->browse(function (Browser $browser) {
            $user=login_user_admin::first();
//            $user=login_user::first();
//            dd($admin_user->username);
            $browser->visit(new LoginPage())
                    ->type('userName',$user->username)
                    ->typeSlowly('userPassword',$user->password)
                    ->press('SignIn')
                    ->pause(5000)
            ->assertSee('You are admin user')
            ->assertPathIs('/logged');
        });

//        $this->browse(function (Browser $browser) {
////            $admin_user=login_user_admin::first();
////            dd($admin_user->username);
//            $browser->visit('/')
//                ->type('username','2929719362')
//                ->type('password','jamal1361')
//                ->press('ورود')
//                ->pause(5000);
//        });
    }
    public function testLoginValidationForm()
    {

        $this->browse(function (Browser $browser) {

            $browser->visit(new LoginPage())
                ->type('userName','')
                ->type('userPassword','')
                ->press('SignIn')
                ->pause(5000)
                ->assertSeeIn('input[name="userName"]',
                    'Both Fields are required')
                ->assertSeeIn('input[name="userPassword"]',
                    'Both Fields are required')
                ->assertPathIs('/login');

        });

//        $this->browse(function (Browser $browser) {
////            $admin_user=login_user_admin::first();
////            dd($admin_user->username);
//            $browser->visit('/')
//                ->type('username','2929719362')
//                ->type('password','jamal1361')
//                ->press('ورود')
//                ->pause(5000);
//        });
    }
}
