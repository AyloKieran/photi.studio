<?php

namespace App\Managers\User\Preference\Profiles;

use App\Managers\BaseManager;
use App\Managers\Azure\Blobs\AzureBlobManager;
use App\Managers\Image\Adjustments\ImageAdjustmentManager;
use App\Enums\BlobTypeEnum;

class UserProfileAvatarManager extends BaseManager
{
    protected $__AzureBlobManager;
    protected $__ImageAdjustmentManager;

    function __construct()
    {
        parent::__construct();

        $this->__AzureBlobManager = new AzureBlobManager();
        $this->__ImageAdjustmentManager = new ImageAdjustmentManager();
    }

    public function updateAvatar($file)
    {
        $resizedAvatarFile = $this->__ImageAdjustmentManager->resizeImage($file, 160); // TO DO: make this a constant
        $avatarURL = $this->__AzureBlobManager->createBlobFromFile($resizedAvatarFile, BlobTypeEnum::AVATAR_IMAGE);

        return $avatarURL;
    }
}
