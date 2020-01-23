<?php

namespace App\Services\RSSFeed;

interface RSSFeedInterface
{
    public function getFeedContent(): array;

    public function getMostFrequentWords(int $count): array;
}
