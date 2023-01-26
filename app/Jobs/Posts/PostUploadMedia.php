<?php

namespace App\Jobs\Posts;

use App\Jobs\BasePostJob;
use App\Models\Post;
use App\Enums\BlobTypeEnum;
use App\Enums\FileTypeEnum;
use App\Enums\PostStatusEnum;
use App\Managers\Azure\Blobs\AzureBlobManager;
use App\Managers\Image\Adjustments\ImageAdjustmentManager;
use Illuminate\Http\File;
use Async;

class PostUploadMedia extends BasePostJob
{
    protected $__AzureBlobManager;

    public function __construct(Post $post)
    {
        parent::__construct($post);
        $this->__AzureBlobManager = new AzureBlobManager();
    }

    public function handle()
    {
        $image = new File($this->post->local_file_path);

        Async::batchRun(
            function () use ($image) {
                $__ImageAdjustmentManager = new ImageAdjustmentManager();
                $convertedImage = $__ImageAdjustmentManager->convertImage($image, FileTypeEnum::WEBP);
                $this->post->image_original = $this->__AzureBlobManager->createBlobFromFile($convertedImage, BlobTypeEnum::POST_IMAGE_ORIGINAL);
            },
            function () use ($image) {
                $__ImageAdjustmentManager = new ImageAdjustmentManager();
                $resizedPostFile = $__ImageAdjustmentManager->resizeImage($image, 400); // TO DO: make this a constant
                $this->post->image_thumbnail = $this->__AzureBlobManager->createBlobFromFile($resizedPostFile, BlobTypeEnum::POST_IMAGE_THUMBNAIL);
            },
            function () use ($image) {
                $__ImageAdjustmentManager = new ImageAdjustmentManager();
                $convertedImage = $__ImageAdjustmentManager->convertImage($image, FileTypeEnum::JPEG);
                $this->post->image_cv = $this->__AzureBlobManager->createBlobFromFile($convertedImage, BlobTypeEnum::POST_IMAGE_COMPUTERVISION);
            }
        );

        $this->post->status = PostStatusEnum::ANALYSING->value;
        $this->post->save();
    }
}
