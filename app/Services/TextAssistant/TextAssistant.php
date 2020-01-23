<?php

namespace App\Services\TextAssistant;

use App\Services\RSSFeed\RSSItem;
use SimplePie_Item;

class TextAssistant implements TextAssistantInterface
{
    const COMMON_ENGLISH_WORDS = [
        'the',
        'be',
        'to',
        'of',
        'and',
        'a',
        'in',
        'that',
        'have',
        'I',
        'it',
        'for',
        'not',
        'on',
        'with',
        'he',
        'as',
        'you',
        'do',
        'at',
        'this',
        'but',
        'his',
        'by',
        'from',
        'they',
        'we',
        'say',
        'her',
        'she',
        'or',
        'an',
        'will',
        'my',
        'one',
        'all',
        'would',
        'there',
        'their',
        'what',
        'so',
        'up',
        'out',
        'if',
        'about',
        'who',
        'get',
        'which',
        'go',
        'me',
        'has',
        'had',
        'is',
        'are',
        'was',
        'were',
    ];

    public function getFrequentWordsFromFeed(array $feedItems, int $count = 10): array
    {
        $countedItems = [];
        $allWords     = [];

        foreach ($feedItems as $item) {
            $content    = $this->extractPlainTextFromItem($item);
            $itemWords  = $this->excludeCommonEnglishWords($this->splitText($content));
            $wordsCount = array_count_values($itemWords);

            $countedItems[] = $wordsCount;

            $allWords = array_merge($allWords, array_keys($wordsCount));
        }

        $countedWords = $this->countWords($allWords, $countedItems);

        arsort($countedWords);

        return array_slice($countedWords, 0, $count);
    }

    private function countWords(array $words, array $countedItems): array
    {
        $uniqueWords  = array_unique($words);
        $countedWords = [];

        foreach ($uniqueWords as $word) {
            $countedWords[$word] = array_sum(array_column($countedItems, $word));
        }

        return $countedWords;
    }

    private function excludeCommonEnglishWords($words): array
    {
        return array_udiff($words, self::COMMON_ENGLISH_WORDS, 'strcasecmp');
    }

    private function extractPlainTextFromItem(RSSItem $item): string
    {
        return str_replace(
            ['\' ', ' \'', '" ', ' "'],
            [' ', ' ', ' ', ' '],
            strip_tags($item->title . ' ' . $item->description)
        );
    }

    private function splitText($text): array
    {
        return str_word_count($text, 1);
    }
}
