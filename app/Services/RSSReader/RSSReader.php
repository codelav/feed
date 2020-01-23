<?php

namespace App\Services\RSSReader;

use App\Services\RSSFeed\Exceptions\RSSFeedException;
use App\Services\RSSFeed\RSSItem;
use DateTime;
use Exception;
use SimplePie;
use SimplePie_Item;

class RSSReader implements RSSReaderInterface
{
    private $simplePie;

    public function __construct(SimplePie $simplePie)
    {
        $this->simplePie = $simplePie;
        $this->configure();
        $this->simplePie->set_feed_url(env('RSS_FEED_URL'));
        $this->simplePie->init();
    }

    public function getFeedTitle(): string
    {
        return $this->simplePie->get_title();
    }

    public function getFeedPermalink(): string
    {
        return $this->simplePie->get_permalink();
    }

    /**
     * @return RSSItem[]
     * @throws RSSFeedException
     */
    public function getFeedItems(): array
    {
        /* @var SimplePie_Item[] $items */
        $items = $this->simplePie->get_items();

        $feedItems = [];

        foreach ($items as $item) {
            try {
                $date = new DateTime($item->get_date());
            } catch (Exception $e) {
                throw new RSSFeedException('RSS Item\'s date format error', null);
            }

            $feedItems[] = new RSSItem(
                $date,
                $item->get_description(),
                $item->get_permalink(),
                $item->get_title()
            );
        }

        return $feedItems;
    }

    private function configure(): void
    {
        if (config('cache.disabled')) {
            $this->simplePie->enable_cache(false);
        } else {
            $this->simplePie->set_cache_location(storage_path('framework/cache'));
            $this->simplePie->set_cache_duration(60 * 15);
        }
    }
}
