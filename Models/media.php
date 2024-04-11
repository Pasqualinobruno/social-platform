<?php

class Media
{
    public $type;
    public $path;

    public function __construct($type, $path)
    {
        $this->type = $type;
        $this->path = $path;
    }

    public function display()
    {
        if ($this->type === 'image') {
            echo "<img src='{$this->path}' alt=''>";
        } elseif ($this->type === 'video') {
            echo "<video src='{$this->path}' controls></video>";
        } else {
            echo "Unsupported media type";
        }
    }
}
