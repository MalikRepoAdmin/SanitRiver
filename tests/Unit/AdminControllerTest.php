<?php

namespace Tests\Unit;

use App\Http\Controllers\AdminController;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_view()
    {
        Admin::create(['email' => 'admin123@gmail.com', 'username' => 'a1', 'password' => 'pw12345']);

        $ctl = new AdminController();
        $req = Request::create('/?per_page=10', 'GET');

        $res = $ctl->index($req);
        $this->assertInstanceOf(View::class, $res);
    }

    public function test_show_returns_profile_view()
    {
        $admin = Admin::create(['username' => 'showadmin', 'password' => 'pw12345', 'email' => 'admin12@gmail.com']);

        $ctl = new AdminController();
        $res = $ctl->show($admin->admin_id);

        $this->assertInstanceOf(View::class, $res);
    }
}
