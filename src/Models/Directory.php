<?php
/**
 * Created by PhpStorm.
 * User: X
 * Date: 21.07.2018
 * Time: 17:19
 */

namespace Pietrak98\LFMExtra\src\Models;


class Directory implements \Countable
{
    public $src;

    public $subDirectories;
    public function __construct($src)
    {
        $this->src=$src;

        $this->name = basename($src);
    }

    public function count() {
        $count = 0;
        foreach ($this->subDirectories as $object) {
            if ($object->isThumb() == false) $count++;
        }

        return $count;
    }

    public function setSubDirectories($dirs) {
        $this->subDirectories = $dirs;

        return $this;
    }

    public function hasSub() {
        return $this->count($this->subDirectories) > 0;
    }

    public function isThumb() {
        return $this->name == "thumbs";
    }
}