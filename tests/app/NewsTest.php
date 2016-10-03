<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * msg
     *
     * @return void
     */
    public function test_news_is_published_as_it_should()
    {
        $news = factory(App\News::class)->create();

        $this->call('get', $news->url());

        $this->seeInElement('h1', $news->title);
    }

    /**
     * msg
     *
     * @return void
     */
    public function test_new_is_not_published_as_it_should_not()
    {
        $news = factory(App\News::class)->create([
            'publish' => 0
        ]);

        $this->call('get', $news->url());

        $this->assertResponseStatus(404);
    }
}
