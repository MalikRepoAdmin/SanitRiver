<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AuthPagesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->date('tgl_lahir')->nullable();
            $table->text('bio')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->text('domisili')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function test_login_page_renders_auth_form_and_registration_link(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Login Akun SanitRiver')
            ->assertSee('name="login"', false)
            ->assertSee('name="password"', false)
            ->assertSee(route('register'));
    }

    public function test_user_can_log_in_with_username(): void
    {
        $user = User::create([
            'email' => 'login@example.test',
            'username' => 'loginuser',
            'password' => 'password',
            'nama_lengkap' => 'Test User',
            'tgl_lahir' => '2000-01-01',
        ]);

        $this->post(route('login.authenticate'), [
            'login' => 'loginuser',
            'password' => 'password',
        ])
            ->assertRedirect(route('beranda'))
            ->assertSessionHasNoErrors();

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_log_in_with_email(): void
    {
        $user = User::create([
            'email' => 'email-login@example.test',
            'username' => 'emailuser',
            'password' => 'password',
            'nama_lengkap' => 'Email User',
            'tgl_lahir' => '2000-01-01',
        ]);

        $this->post(route('login.authenticate'), [
            'login' => 'email-login@example.test',
            'password' => 'password',
        ])
            ->assertRedirect(route('beranda'))
            ->assertSessionHasNoErrors();

        $this->assertAuthenticatedAs($user);
    }

    public function test_register_page_renders_required_user_fields(): void
    {
        $this->get(route('register'))
            ->assertOk()
            ->assertSee('Daftar Akun SanitRiver')
            ->assertSee('name="nama_lengkap"', false)
            ->assertSee('name="email"', false)
            ->assertSee('name="username"', false)
            ->assertSee('name="pekerjaan"', false)
            ->assertSee('name="domisili"', false)
            ->assertSee('name="tgl_lahir"', false)
            ->assertSee('type="date"', false)
            ->assertSee('name="bio"', false)
            ->assertSee('name="password_confirmation"', false)
            ->assertSee(route('login'))
            ->assertSeeInOrder(['Domisili', 'Tanggal Lahir', 'Email']);
    }

    public function test_user_can_register_from_the_registration_form(): void
    {
        $this->post(route('register.store'), [
            'nama_lengkap' => 'New User',
            'email' => 'new-user@example.test',
            'username' => 'newuser',
            'pekerjaan' => 'Developer',
            'domisili' => 'Jakarta',
            'tgl_lahir' => '1995-05-15',
            'bio' => 'Suka menjaga kebersihan sungai.',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ])
            ->assertRedirect(route('beranda'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', [
            'email' => 'new-user@example.test',
            'username' => 'newuser',
            'nama_lengkap' => 'New User',
            'pekerjaan' => 'Developer',
            'domisili' => 'Jakarta',
            'tgl_lahir' => '1995-05-15',
            'bio' => 'Suka menjaga kebersihan sungai.',
        ]);
        $this->assertAuthenticated();
    }
}
