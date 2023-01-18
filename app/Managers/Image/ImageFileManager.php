<?php

namespace App\Managers\Image;

use App\Enums\FileTypeEnum;
use App\Managers\BaseManager;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Image;

class ImageFileManager extends BaseManager
{
    function __construct()
    {
        parent::__construct();
    }

    private function generateFilePath($fileName)
    {
        return storage_path() . "/app/" . $fileName;
    }

    public function saveImageToFile(UploadedFile $image, FileTypeEnum $fileType = FileTypeEnum::WEBP)
    {
        $fileName = $image->hashName();
        $filePath = $this->generateFilePath($fileName);

        $image = Image::make($image)->save($filePath, 75, $fileType->value);

        return $filePath;
    }
}
