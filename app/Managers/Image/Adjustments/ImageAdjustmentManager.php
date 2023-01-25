<?php

namespace App\Managers\Image\Adjustments;

use App\Enums\FileTypeEnum;
use App\Managers\BaseManager;
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

    public function resizeImage(File $image, $width, $height = null, $crop = false, FileTypeEnum $fileType = FileTypeEnum::WEBP)
    {
        $fileName = $image->hashName();
        $filePath = $this->generateFilePath($fileName);

        $image = Image::make($image)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        if ($crop) {
            $image->fit($width, $height);
        }

        $image->save($filePath, 75, $fileType->value);

        return new File($filePath);
    }

    public function convertImage(File $image, FileTypeEnum $fileType)
    {
        $fileName = $image->hashName();
        $filePath = $this->generateFilePath($fileName);

        $image = Image::make($image);
        $image->save($filePath, 75, $fileType->value);

        return new File($filePath);
    }
}
