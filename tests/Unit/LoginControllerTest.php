<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use PragmaRX\Google2FA\Google2FA;

class LoginControllerTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    /**
     * Test login with valid credentials.
     *
     * @return void
     */

    public function testLoginWithValidCredentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('home');
        $response->assertSessionHas('success', 'Bienvenido ' . $user->name);
        $this->assertAuthenticatedAs($user);
    }

    public function testLoginWithInValidCredentials()
    {
        $response = $this->post('/login', [
            'email' => 'invalid@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error', 'Error en los datos de acceso');
        $this->assertGuest();
    }

    function testLoginLogoutSuccessfully()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function testLoginWithBlockedTemporarilyUser()
    {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        for ($i = 0; $i < 5; $i++) {
            $response = $this->post('/login', [
                'email' => 'test@example.com',
                'password' => 'wrong_password',
            ]);
        }

        $response->assertSessionHas('error', 'Usuario bloqueado. Por favor, espere 60 segundos antes de intentarlo nuevamente.');
        $response->assertRedirect('/');
    }

    public function testLoginWithBlockedPermanentlyUser()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
            'blocked_permanently' => true,
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('error', 'Usuario bloqueado permanentemente. Por favor, contacta al administrador para obtener ayuda.');
        $this->assertGuest();
    }

    public function testLoginWithValidCredentialsDisabledMfa()
    {
        $user = User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'user_id' => 1,
            'login_2fa_statu' => 1
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
            'remember' => false
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    public function testLoginWithValidCredentialsMfa()
    {

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'login_2fa_statu' => 2,
            'token_login' => (new Google2FA())->generateSecretKey(16)
        ]);

        $code = (new Google2FA())->getCurrentOtp($user->token_login);

        $this->actingAs($user);

        $this->post('/login2fa', [
            'code_verification' => $code,
            'correo' => 'test@example.com',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    function testLoginWithInvalidCredentialsMfa()
    {

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'login_2fa_statu' => 2,
            'token_login' => (new Google2FA())->generateSecretKey(16)
        ]);

        $this->actingAs($user);

        $this->post('/login2fa', [
            'code_verification' => 159742,
            'correo' => 'test@example.com',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    function testLoginWithInvalidCredentialsEmailMfa()
    {

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'login_2fa_statu' => 2,
            'token_login' => (new Google2FA())->generateSecretKey(16)
        ]);

        $code = (new Google2FA())->getCurrentOtp($user->token_login);
        $this->actingAs($user);

        $this->post('/login2fa', [
            'code_verification' => $code,
            'correo' => 'admin@example.com',
        ]);

        $this->assertAuthenticatedAs($user);
    }

}
