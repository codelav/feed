<?php

namespace App\Providers;

use App\Services\RSSFeed\RSSFeed;
use App\Services\RSSFeed\RSSFeedInterface;
use App\Services\RSSReader\RSSReader;
use App\Services\RSSReader\RSSReaderInterface;
use App\Services\TextAssistant\TextAssistant;
use App\Services\TextAssistant\TextAssistantInterface;
use Illuminate\Support\ServiceProvider;

class RSSFeedServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RSSFeedInterface::class, RSSFeed::class);
        $this->app->bind(RSSReaderInterface::class, RSSReader::class);
        $this->app->bind(TextAssistantInterface::class, TextAssistant::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
