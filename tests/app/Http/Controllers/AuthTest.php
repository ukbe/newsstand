<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class AuthTest extends TestCase
{
//    use DatabaseTransactions;

    /**
     * msg
     *
     * @return void
     */
    public function test_anonumous_access_to_news_post()
    {
        $this->call('get', '/news/post');

        $this->assertRedirectedTo('/login');
    }

    /**
     * msg
     *
     * @return void
     */
    public function test_anonumous_access_to_news_posted()
    {
        $this->call('get', '/news/posted');

        $this->assertRedirectedTo('/login');
    }

    /**
     * msg
     *
     * @return void
     */
    public function test_anonumous_access_to_news_post_submit()
    {
        $this->call('post', '/news/post');

        $this->assertResponseStatus(405);
    }

    /**
     * msg
     *
     * @return void
     */
    public function test_user_register()
    {
        $this->post('/register', ['name' => 'Test User', 'email' => 'testuser@example.com']);

        $this->assertRedirectedTo('/');

        $this->seeInDatabase('users', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'verified' => 0
        ]);
    }

    /**
     * msg
     *
     * @return void
     */
    public function test_user_verify()
    {
        $user = factory(App\User::class)->create([
            'verified' => 0,
            'verification_token' => 'TESTTOKEN'
        ]);

        $this->visit('/verify/' . $user->verification_token)
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->press('Create Password')
            ->seeText('You have successfully verified your email address.');
    }

}
