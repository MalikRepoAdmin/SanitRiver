<?php

namespace Tests\Unit;

use App\Http\Controllers\AuthController;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_register_and_login_views()
    {
        $ctl = new AuthController();

        $this->assertInstanceOf(View::class, $ctl->showRegisterUser());
        $this->assertInstanceOf(View::class, $ctl->showRegisterAdmin());
        $this->assertInstanceOf(View::class, $ctl->showLoginUser());
        $this->assertInstanceOf(View::class, $ctl->showLoginAdmin());
    }

    public function test_register_user_and_admin_redirects()
    {
        $ctl = new AuthController();

        $req = Request::create('/', 'POST', [
            'email' => 'u@example.test',
            'username' => 'user1',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'nama_lengkap' => 'Full Name',
            'tgl_lahir' => '2000-01-01',
        ]);
        $req->setLaravelSession(session());

        $res = $ctl->registerUser($req);
        $this->assertInstanceOf(RedirectResponse::class, $res);
        $this->assertDatabaseHas('users', ['email' => 'u@example.test']);

        $req2 = Request::create('/', 'POST', [
            'email' => 'a@example.test',
            'username' => 'admin1',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]);
        $req2->setLaravelSession(session());

        $res2 = $ctl->registerAdmin($req2);
        $this->assertInstanceOf(RedirectResponse::class, $res2);
        $this->assertDatabaseHas('admins', ['email' => 'a@example.test']);
    }

    public function test_login_and_logout_flow()
    {
        $user = User::create([
            'email' => 'login@example.test',
            'username' => 'loginuser',
            'password' => 'password',
            'nama_lengkap' => 'N',
            'tgl_lahir' => '2000-01-01',
        ]);

        $ctl = new AuthController();

        $req = Request::create('/', 'POST', [
            'login' => 'loginuser',
            'password' => 'password',
        ]);
        $req->setLaravelSession(session());

        $res = $ctl->loginUser($req);
        $this->assertInstanceOf(RedirectResponse::class, $res);

        $logoutReq = Request::create('/', 'POST');
        $logoutReq->setLaravelSession(session());
        $res2 = $ctl->logoutUser($logoutReq);
        $this->assertInstanceOf(RedirectResponse::class, $res2);
    }
}
