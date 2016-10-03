<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase
{
    /**
     * msg
     *
     * @return void
     */
    public function test_displays_featured_news_on_homepage()
    {
        $this->call('get', '/');

        $this->seeInElement('div.panel-heading', 'Featured News');
    }

}
