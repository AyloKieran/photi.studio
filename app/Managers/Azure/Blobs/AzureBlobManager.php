<?php

namespace App\Managers\Azure\Blobs;

use App\Managers\BaseManager;
use App\Enums\BlobTypeEnum;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AzureBlobManager extends BaseManager
{
    function __construct()
    {
        parent::__construct();
    }

    private function generateURL($blobPath)
    {
        if (env('AZURE_STORAGE_URL') != "") {
            $baseURL = env('AZURE_STORAGE_URL') . env('AZURE_STORAGE_CONTAINER') . "/";
        } else {
            $baseURL = "https://" . env('AZURE_STORAGE_NAME') . ".blob.core.windows.net/" . env('AZURE_STORAGE_CONTAINER') . "/";
        }

        return $baseURL . $blobPath;
    }

    public function createBlob(UploadedFile $file, BlobTypeEnum $blobPath)
    {
        $blobPath = $file->store($blobPath->value, 'azure');
        return $this->generateUrl($blobPath);
    }

    public function createBlobFromFile($filePath, BlobTypeEnum $blobPath)
    {
        $file = new File($filePath);
        $blobPath = Storage::disk('azure')->put($blobPath->value, $file);
        return $this->generateUrl($blobPath);
    }
}
