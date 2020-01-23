<?php

namespace App\Services\RSSFeed;

use App\Services\RSSReader\RSSReaderInterface;
use App\Services\TextAssistant\TextAssistantInterface;

class RSSFeed implements RSSFeedInterface
{
    private $feedReader;
    private $textAssistant;

    public function __construct(RSSReaderInterface $feedReader, TextAssistantInterface $textAssistant)
    {
        $this->feedReader    = $feedReader;
        $this->textAssistant = $textAssistant;
    }

    public function getFeedContent(): array
    {
        return $this->feedReader->getFeedItems();
    }

    public function getMostFrequentWords(int $count = 10): array
    {
        return $this->textAssistant->getFrequentWordsFromFeed($this->feedReader->getFeedItems(), $count);
    }
}
