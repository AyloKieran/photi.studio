<?php

namespace App\Managers\Image\Adjustments;

use App\Managers\BaseManager;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Image;

class ImageAdjustmentManager extends BaseManager
{
    function __construct()
    {
        parent::__construct();
    }

    private function generateFilePath($fileName)
    {
        return storage_path() . "/app/" . $fileName;
    }

    public function resizeImage(UploadedFile $image, $width, $height = null)
    {
        $fileName = $image->hashName();
        $filePath = $this->generateFilePath($fileName);

        $image = Image::make($image)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save($filePath, 75, 'webp');

        return new File($filePath);
    }

    public function convertImage(UploadedFile $image)
    {
        $fileName = $image->hashName();
        $filePath = $this->generateFilePath($fileName);

        $image = Image::make($image);
        $image->save($filePath, 75, 'webp');

        return new File($filePath);
    }
}
