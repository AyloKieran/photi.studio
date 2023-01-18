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
use Spatie\Async\Pool;

class PostUploadMedia extends BasePostJob
{
    protected $__AzureBlobManager;
    protected $__ImageAdjustmentManager;

    public function __construct(Post $post)
    {
        parent::__construct($post);

        $this->__AzureBlobManager = new AzureBlobManager();
        $this->__ImageAdjustmentManager = new ImageAdjustmentManager();
    }

    public function handle()
    {
        $image = new File($this->post->local_file_path);

        $pool = Pool::create()->concurrency(3);

        $pool[0] = async(function () use ($image) {
            $convertedImage = $this->__ImageAdjustmentManager->convertImage($image, FileTypeEnum::WEBP);
            $this->post->image_original = $this->__AzureBlobManager->createBlobFromFile($convertedImage, BlobTypeEnum::POST_IMAGE_ORIGINAL);
        });
        $pool[1] = async(function () use ($image) {
            $resizedPostFile = $this->__ImageAdjustmentManager->resizeImage($image, 400); // TO DO: make this a constant
            $this->post->image_thumbnail = $this->__AzureBlobManager->createBlobFromFile($resizedPostFile, BlobTypeEnum::POST_IMAGE_THUMBNAIL);
        });
        $pool[2] = async(function () use ($image) {
            $convertedImage = $this->__ImageAdjustmentManager->convertImage($image, FileTypeEnum::JPEG);
            $this->post->image_cv = $this->__AzureBlobManager->createBlobFromFile($convertedImage, BlobTypeEnum::POST_IMAGE_COMPUTERVISION);
        });

        await($pool);

        $this->post->status = PostStatusEnum::ANALYSING->value;
        $this->post->save();
    }
}
