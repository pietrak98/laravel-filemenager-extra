<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    */
    // Middlewares which should be applied to all package routes.
    // For laravel 5.1 and before, remove 'web' from the array.
    'middlewares'            => ['web', 'auth'],
    // The url to this package. Change it if necessary.
    'prefix'                 => 'admin/filemanager',

    'disk' => 'public',

    // If true, share folder will be created when allow_multi_user is true.
    'allow_share_folder'     => true,


    // If true, the uploaded file will be renamed to uniqid() + file extension.
    'rename_file'            => false,
    // If rename_file set to false and this set to true, then non-alphanumeric characters in filename will be replaced.
    'alphanumeric_filename'  => true,
    // If true, non-alphanumeric folder name will be rejected.
    'alphanumeric_directory' => true,
    // If true, the uploading file's size will be verified for over than max_image_size/max_file_size.
    'should_validate_size'   => true,

    'max_image_size'         => 5120,
    'max_file_size'          => 5120,

    // If true, the uploading file's mime type will be valid in valid_image_mimetypes/valid_file_mimetypes.
    'should_validate_mime'   => true,
    // available since v1.3.0
    'valid_file_mimetypes'  => [
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/gif',
        'application/pdf',
        'text/plain',
    ],

    /*
    |--------------------------------------------------------------------------
    | Image / Folder Setting
    |--------------------------------------------------------------------------
    */
    'thumb_img_width'        => 200,
    'thumb_img_height'       => 200,


    /*
    |--------------------------------------------------------------------------
    | File Extension Information
    |--------------------------------------------------------------------------
    */

    'file_type_array' => [
        'pdf'  => 'Adobe Acrobat',
        'doc'  => 'Microsoft Word',
        'docx' => 'Microsoft Word',
        'xls'  => 'Microsoft Excel',
        'xlsx' => 'Microsoft Excel',
        'zip'  => 'Archive',
        'gif'  => 'GIF Image',
        'jpg'  => 'JPEG Image',
        'jpeg' => 'JPEG Image',
        'png'  => 'PNG Image',
        'ppt'  => 'Microsoft PowerPoint',
        'pptx' => 'Microsoft PowerPoint',
    ],

    // file extensions array, only for showing icons, it won't affect the upload process.
    'file_icon_array' => [
        'pdf'  => 'icon-file-pdf',
        'doc'  => 'icon-file-word',
        'docx' => 'icon-file-word',
        'xls'  => 'icon-file-excel',
        'xlsx' => 'icon-file-excel',
        'zip'  => 'icon-file-archive',
        'gif'  => 'icon-file-image',
        'jpg'  => 'icon-file-image',
        'jpeg' => 'icon-file-image',
        'png'  => 'icon-file-image',
        'ppt'  => 'icon-file-powerpoint',
        'pptx' => 'icon-file-powerpoint',
        'txt'  => 'icon-file-word',
    ],
];