<?php

namespace App\Http\Controllers;

use App\Services\RSSFeed\RSSFeedInterface;

class FrontController extends Controller
{
    private $feed;

    public function __construct(RSSFeedInterface $feed)
    {
        $this->feed = $feed;
    }

    public function index()
    {
        $renderParams = [
            'frequentWords' => $this->feed->getMostFrequentWords(10),
            'items'         => $this->feed->getFeedContent(),
        ];

        return view('front', $renderParams);
    }
}
