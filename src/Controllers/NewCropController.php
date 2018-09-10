<?php

namespace App\Http\Controllers\FileManager;

use Illuminate\Support\Facades\Log;
use Unisharp\Laravelfilemanager\controllers\CropController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class NewCropController extends CropController
{
    /**
     * Show crop page
     *
     * @return mixed
     */
    public function getCropimage()
    {
        $image = Input::get('img');
        $working_dir = Input::get('working_dir');
        $imagePath = public_path() . '/' . trim(Config::get('lfm.files_folder_name'), '/\\') . $working_dir . '/' . $image;
        $dataX = Input::get('dataX');
        $dataY = Input::get('dataY');
        $dataHeight = Input::get('dataHeight');
        $dataWidth = Input::get('dataWidth');
        $rotate = Input::get('rotate');
        $scaleX = Input::get('scaleX');
        $scaleY = Input::get('scaleY');

     // crop image
        $tmp_img = Image::make($imagePath);
        if($scaleX == '-1') {
            $tmp_img->flip('h');
        }
        if($scaleY == '-1') {
            $tmp_img->flip('v');
        }
        $tmp_img->rotate(-$rotate);
        $tmp_img->crop($dataWidth, $dataHeight, $dataX, $dataY);


        // make new thumbnail
        $thumb_img = clone $tmp_img;

        $thumb_img->fit(200, 200)
            ->save(parent::getThumbPath(parent::getName($imagePath)));
        $tmp_img->save($imagePath);
    }
}