<?php

namespace App\Managers\Azure\Blobs;

use App\Managers\BaseManager;
use App\Enums\BlobTypeEnum;

class AzureBlobManager extends BaseManager
{
    private function generateURL($blobPath)
    {
        $baseURL = "https://" . env('AZURE_STORAGE_NAME') . ".blob.core.windows.net/" . env('AZURE_STORAGE_CONTAINER') . "/";

        return $baseURL . $blobPath;
    }

    public function createBlob($blobContents, BlobTypeEnum $blobPath)
    {
        $blobPath = $blobContents->store($blobPath->value, 'azure');
        return $this->generateUrl($blobPath);
    }
}
