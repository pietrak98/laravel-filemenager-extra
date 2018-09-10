<?php

namespace App\Http\Controllers\FileManager;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Unisharp\Laravelfilemanager\controllers\ResizeController;

class NewResizeController extends ResizeController
{

    public function performResize()
    {
        $image    = Input::get('img');
        $working_dir = Input::get('working_dir');
        $height = Input::get('dataHeight');
        $width  = Input::get('dataWidth');

        try {
            Image::make(public_path() . '/' . trim(Config::get('lfm.files_folder_name'), '/\\') . $working_dir . '/' . $image)->resize($width, $height)->save();
            return "OK";
        } catch (Exception $e) {
            return "width : " . $width . " height: " . $height;
        }

    }
}