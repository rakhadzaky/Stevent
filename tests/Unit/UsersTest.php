<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testHomePage()
    {
        $response = $this->call('GET', '/');
        $this->assertRegexp('/Laravel/', $response->getContent());
    }

    public function user_can_view_login_form() {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function user_can_view_register_form(){
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function registered_user_can_login()
    {
        $user = factory(User::class)->create([
            'email'    => 'username@example.net',
            'password' => 'secret',
        ]);
        $response = $this->get('/login');
        $response = $this->SubmitForm('Login', [
            'email'    => 'username@example.net',
            'password' => 'secret',
        ]);
        $this->seePageIs('/home');
    }

    public function logged_in_user_can_logout()
    {

        $user = factory(User::class)->create([
            'email'    => 'username@example.net',
            'password' => 'secret',
        ]);

        $this->actingAs($user);
        $this->visit('/home');
        $this->post('/logout');
        $this->visit('/home');
        $this->seePageIs('/login');
    }

}