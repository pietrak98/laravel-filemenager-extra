<?php
$middleware = config('lfme.middlewares');
$prefix = config('lfme.prefix');
$as = 'lfme.';


// make sure authenticated
Route::group(compact('middleware', 'prefix', 'as'), function () {
    Route::auth();

// Show LFM
Route::get('/', [
'uses' => '\Pietrak98\LFMExtra\Controllers\ViewsController@index',
'as' => 'show'
]);

// upload
Route::any('/upload', [
'uses' => '\Pietrak98\LFMExtra\Controllers\UploadController@upload',
'as' => 'upload'
]);

//// list images & files
//Route::get('/jsonitems', [
//'uses' => '\Pietrak98\LFMExtra\Controllers\ItemsController@getItems',
//'as' => 'getItems'
//]);
//
//// folders
//Route::get('/newfolder', [
//'uses' => '\Pietrak98\LFMExtra\Controllers\FolderController@getAddfolder',
//'as' => 'getAddfolder'
//]);
//Route::get('/folders', [
//'uses' => '\Pietrak98\LFMExtra\Controllers\FolderController@getFolders',
//'as' => 'getFolders'
//]);
//
//// crop
//Route::get('/crop', [
//'uses' => '\Pietrak98\LFMExtra\Controllers\CropController@getCrop',
//'as' => 'getCrop'
//]);
//Route::get('/cropimage', [
//'uses' => 'FileManager\NewCropController@getCropimage',
//'as' => 'getCropimage'
//]);
//
//// rename
//Route::get('/rename', [
//'uses' => '\Pietrak98\LFMExtra\Controllers\RenameController@getRename',
//'as' => 'getRename'
//]);
//
//// scale/resize
//Route::get('/resize', [
//'uses' => '\Pietrak98\LFMExtra\Controllers\ResizeController@getResize',
//'as' => 'getResize'
//]);
//Route::get('/resizeimage', [
//'uses' => '\Pietrak98\LFMExtra\Controllers\ResizeController@performResize',
//'as' => 'performResize'
//]);
//
//// download
//Route::get('/download', [
//'uses' => '\Pietrak98\LFMExtra\Controllers\DownloadController@getDownload',
//'as' => 'getDownload'
//]);
//
//// delete
//Route::get('/delete', [
//'uses' => '\Pietrak98\LFMExtra\Controllers\DeleteController@getDelete',
//'as' => 'getDelete'
//]);
//
//Route::get('/setShowList', [
//'uses' => 'FileManager\HomeController@setShowList',
//'as' => 'setShowList'
//]);
});
