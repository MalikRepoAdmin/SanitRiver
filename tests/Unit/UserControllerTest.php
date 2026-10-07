<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_view()
    {
        User::factory()->create();

        $ctl = new UserController();
        $req = Request::create('/?per_page=10', 'GET');

        $res = $ctl->index($req);
        $this->assertInstanceOf(View::class, $res);
    }

    public function test_show_returns_profile_view()
    {
        $user = User::factory()->create();

        $ctl = new UserController();
        $res = $ctl->show($user->user_id);

        $this->assertInstanceOf(View::class, $res);
    }

    public function test_update_allowed_for_owner()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $ctl = new UserController();
        $req = Request::create('/', 'PUT', ['nama_lengkap' => 'Updated']);
        $req->setLaravelSession(session()->driver());

        $res = $ctl->update($req, $user->user_id);
        $this->assertEquals(302, $res->getStatusCode());
        $this->assertDatabaseHas('users', ['user_id' => $user->user_id, 'nama_lengkap' => 'Updated']);
    }
}
