<?php

class Post
{
    public $title;
    public $tags;
    public $date;
    public $mediaItems = [];

    public function __construct($title, $tags, $date, ...$media)
    {
        $this->title = $title;
        $this->tags = $tags;
        $this->date = $date;

        foreach ($media as $item) {
            $this->addMedia($item);
        }
    }

    public function addMedia($media)
    {
        $this->mediaItems[] = $media;
    }
}
