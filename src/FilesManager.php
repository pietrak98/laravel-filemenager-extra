<?php

namespace Pietrak98\LFMExtra\src;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Pietrak98\LFMExtra\src\Models\Directory;
use Pietrak98\LFMExtra\src\Models\File;

class FilesManager
{
    private $userDirectory;
    private $storage;


    /**
     * FilesManager constructor.
     * @param Request $request
     */
    public function __construct($request, $user)
    {
        $this->userDirectory = $user->id;

        if($request->has('src')) {
            $this->src = $request->input('src');
        } else {
            $this->src = $this->userDirectory;
        }
        $this->storage = Storage::disk(config("lfme.disk"));

    }

    public function getTree($directory = null)
    {

        if ($directory == null) {
            $directory = $this->userDirectory;
        }

        $dirs = $this->storage->directories($directory);
        $tree = [];

        foreach ($dirs as $value) {
            $tree[] = (new Directory($value))->setSubDirectories($this->getTree($value));
        }
        return $tree;
    }

    public function getDirs($directory = null)
    {
        if ($directory == null) {
            $directory = $this->src;
        }

        $dirs = $this->storage->directories($directory);
        $dirsList = [];

        foreach ($dirs as $value) {
            $dirsList[] = new Directory($value);
        }
        return $dirsList;
    }

    public function getFiles($directory = null) {
        if ($directory == null) {
            $directory = $this->src;
        }

        $files = $this->storage->files($directory);
        $filesList = [];

        foreach ($files as $value) {
            $filesList[] = new File($value);
        }
        return $filesList;
    }
}