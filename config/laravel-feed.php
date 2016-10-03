<?php

return [

    'feeds' => [
        [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * '\App\Model@getAllFeedItems'
             */
            'items' => '\App\News@getFeaturedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/rss/featured',

            'title' => 'Featured News from Newsstand',
        ],
    ],

];
