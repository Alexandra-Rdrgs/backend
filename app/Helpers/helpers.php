<?php

use App\Models\Items_users as Items_users;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

function imgSave($image,$folder)
{
    $extOrigine = stristr($image,";base64",true);
    $name = nameImg($extOrigine);
    $pathOrigine = public_path()."/". $folder ."/";
    if (!file_exists($pathOrigine)) {
        mkdir($pathOrigine, 666, true);
    }
    $img = Image::make($image);
    $img->save($pathOrigine.$name);
    return $name;
}
function nameImg($ext)
{
    if($ext === "data:image/png") {
        $name = date('YmdHis', time()) . ".png";
    }
    elseif($ext === "data:image/jpg") {
        $name = date('YmdHis', time()) . ".jpg";
    }
    else {
        $name = date( 'YmdHis', time() ).".jpeg";
    }
    return $name;
}


