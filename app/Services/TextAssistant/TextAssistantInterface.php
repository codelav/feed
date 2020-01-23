<?php

namespace App\Services\TextAssistant;

interface TextAssistantInterface
{
    public function getFrequentWordsFromFeed(array $feedItems, int $count): array;
}
