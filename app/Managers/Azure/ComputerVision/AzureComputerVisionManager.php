<?php

namespace App\Managers\Azure\ComputerVision;

use App\Managers\BaseManager;
use App\Managers\Reflection\ReflectionManager;
use App\Models\DTO\AzureCVResponse;
use Illuminate\Support\Facades\Http;

class AzureComputerVisionManager extends BaseManager
{
    protected $__ReflectionManager;

    function __construct()
    {
        parent::__construct();

        $this->__ReflectionManager = new ReflectionManager();
    }

    private function generateURL()
    {
        return env("AZURE_CV_ENDPOINT") . "vision/v3.2/analyze?visualFeatures=Adult,Color,Description,Tags&language=en&model-version=latest";
    }

    public function getComputerVisionData($imageURL)
    {
        $responseBody = $this->getComputerVisionDataFromAzure($imageURL);
        return $this->__ReflectionManager->reflectToObject($responseBody, AzureCVResponse::class);
    }

    private function getComputerVisionDataFromAzure($imageURL)
    {
        $response = Http::withHeaders([
            'Ocp-Apim-Subscription-Key' => env('AZURE_CV_KEY'),
            'Content-Type' => 'application/json'
        ])->post($this->generateURL(), [
            'url' => $imageURL
        ]);

        return $response->body();
    }
}
