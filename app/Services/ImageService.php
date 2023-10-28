<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageService
{
    public static function store($image) {
        return '/storage/' . $image->store();
    }

    public static function delete($image) {
        $path = public_path($image);

        if (file_exists($path) && basename($path) !== 'image-placeholder.jpg') {
            unlink($path);
        }
    }

    public static function makeThumbnail($image, $dimensions) {
        $path = public_path('/storage/');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();

        Image::make($image->getRealPath())
            ->resize($dimensions[0], $dimensions[1])
            ->save($path . $filename);

        return '/storage/' . $filename;
    }


}
