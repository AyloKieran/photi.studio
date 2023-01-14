<?php

namespace App\Managers\User\Post;

use App\Managers\BaseManager;
use App\Models\Post;
use App\Enums\BlobTypeEnum;
use App\Enums\FileTypeEnum;
use App\Managers\Azure\Blobs\AzureBlobManager;
use App\Managers\Image\Adjustments\ImageAdjustmentManager;
use App\Managers\Azure\ComputerVision\AzureComputerVisionManager;
use Illuminate\Http\UploadedFile;

class UserPostImageManager extends BaseManager
{
    protected $__AzureBlobManager;
    protected $__AzureComputerVisionManager;
    protected $__ImageAdjustmentManager;

    function __construct()
    {
        parent::__construct();

        $this->__AzureBlobManager = new AzureBlobManager();
        $this->__AzureComputerVisionManager = new AzureComputerVisionManager();
        $this->__ImageAdjustmentManager = new ImageAdjustmentManager();
    }

    public function uploadAndAnalyseImage(Post $post, UploadedFile $image)
    {
        $this->uploadPostImageOriginal($post, $image);
        $this->uploadPostImageThumbnail($post, $image);
        return $this->getComputerVisionData($image);
    }

    private function uploadPostImageOriginal(Post $post, UploadedFile $image)
    {
        $convertedImage = $this->__ImageAdjustmentManager->convertImage($image, FileTypeEnum::WEBP);
        $post->image_original = $this->__AzureBlobManager->createBlobFromFile($convertedImage, BlobTypeEnum::POST_IMAGE_ORIGINAL);
    }

    private function uploadPostImageThumbnail(Post $post, UploadedFile $image)
    {
        $resizedPostFile = $this->__ImageAdjustmentManager->resizeImage($image, 400); // TO DO: make this a constant
        $post->image_thumbnail = $this->__AzureBlobManager->createBlobFromFile($resizedPostFile, BlobTypeEnum::POST_IMAGE_THUMBNAIL);
    }

    private function getComputerVisionData(UploadedFile $image)
    {
        $convertedImage = $this->__ImageAdjustmentManager->convertImage($image, FileTypeEnum::JPEG);
        $imageURL = $this->__AzureBlobManager->createBlobFromFile($convertedImage, BlobTypeEnum::POST_IMAGE_COMPUTERVISION);
        $cvInfo = $this->__AzureComputerVisionManager->getComputerVisionData($imageURL);

        return $cvInfo;
    }
}
