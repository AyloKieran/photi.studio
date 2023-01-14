<?php

namespace App\Managers\User\Post;

use App\Managers\BaseManager;
use App\Models\Post;
use App\Managers\Azure\Blobs\AzureBlobManager;
use App\Managers\Image\Adjustments\ImageAdjustmentManager;
use App\Enums\BlobTypeEnum;
use Illuminate\Http\UploadedFile;

class UserPostImageManager extends BaseManager
{
    protected $__AzureBlobManager;
    protected $__ImageAdjustmentManager;

    function __construct()
    {
        parent::__construct();

        $this->__AzureBlobManager = new AzureBlobManager();
        $this->__ImageAdjustmentManager = new ImageAdjustmentManager();
    }

    public function managePostImage(Post $post, UploadedFile $image)
    {
        $this->uploadPostImageOriginal($post, $image);

        $this->uploadPostImageThumbnail($post, $image);
        $this->getComputerVisionData($post);
    }

    private function uploadPostImageOriginal(Post $post, UploadedFile $image)
    {
        $convertedImage = $this->__ImageAdjustmentManager->convertImage($image);
        $post->image_original = $this->__AzureBlobManager->createBlobFromFile($convertedImage, BlobTypeEnum::POST_IMAGE_ORIGINAL);
    }

    private function uploadPostImageThumbnail(Post $post, UploadedFile $image)
    {
        $resizedPostFile = $this->__ImageAdjustmentManager->resizeImage($image, 400); // TO DO: make this a constant
        $post->image_thumbnail = $this->__AzureBlobManager->createBlobFromFile($resizedPostFile, BlobTypeEnum::POST_IMAGE_THUMBNAIL);
    }

    private function getComputerVisionData(Post $post)
    {
    }
}
