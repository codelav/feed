<?php

namespace App\Services\RSSReader;

interface RSSReaderInterface
{
    public function getFeedTitle(): string;

    public function getFeedPermalink(): string;

    public function getFeedItems(): array;
}
