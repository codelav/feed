<?php

namespace App\Services\RSSFeed;

use DateTime;

class RSSItem
{
    public $date;
    public $description;
    public $permalink;
    public $title;

    public function __construct(
        DateTime $date,
        string   $description,
        string   $permalink,
        string   $title
    ) {
        $this->date        = $date;
        $this->description = $description;
        $this->permalink   = $permalink;
        $this->title       = $title;
    }
}
