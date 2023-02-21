<?php

namespace App\Managers\User\Profiles;

use App\Managers\BaseManager;
use App\Managers\Azure\Blobs\AzureBlobManager;
use App\Managers\Image\Adjustments\ImageAdjustmentManager;
use App\Enums\BlobTypeEnum;
use App\Models\User;
use Illuminate\Http\File;

class UserProfileAvatarManager extends BaseManager
{
    protected $__AzureBlobManager;
    protected $__ImageAdjustmentManager;

    public $avatarValidationRules = ['image', 'mimes:jpeg,png,jpg,gif', 'max:8192'];

    function __construct()
    {
        parent::__construct();

        $this->__AzureBlobManager = new AzureBlobManager();
        $this->__ImageAdjustmentManager = new ImageAdjustmentManager();
    }

    public function updateAvatar(User $user, File $file)
    {
        $resizedAvatarFile = $this->__ImageAdjustmentManager->resizeImage($file, 160, 160, true); // TO DO: make this a constant
        $avatarURL = $this->__AzureBlobManager->createBlobFromFile($resizedAvatarFile, BlobTypeEnum::AVATAR_IMAGE);

        $user->avatar = $avatarURL;
    }
}
