<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class AuthTest extends TestCase
{
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
        $user = User::where('email', '=', 'testuser@example.com')->first();

        $this->post('/verify/' . $user->verification_token, ['password' => 'password', 'password-confirm' => 'password'])
            ->seeText('You have successfully verified your email address.');
    }

}
