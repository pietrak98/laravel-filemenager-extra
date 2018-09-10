<?php
/**
 * Created by PhpStorm.
 * User: X
 * Date: 23.07.2018
 * Time: 20:27
 */

namespace Pietrak98\LFMExtra\src\Models;


class File
{
    public $src;

    public function __construct($src)
    {
        $this->src = $src;
    }
}