<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RssTest extends TestCase
{
    /**
     * msg
     *
     * @return void
     */
    public function test_page_header_includes_rss_link()
    {
        $this->call('get', '/');

        $this->seeElement('link', ['type' => 'application/rss+xml']);
    }

    /**
     * msg
     *
     * @return void
     */
    public function test_rss_feed_exists()
    {
        $this->call('get', '/rss/featured');

        $this->assertResponseStatus(200);
    }
}
