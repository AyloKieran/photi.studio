<?php

namespace App\Managers\Reflection;

use App\Managers\BaseManager;
use App\Models\DTO\AzureCVResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;

class ReflectionManager extends BaseManager
{
    protected $serializer;

    function __construct()
    {
        parent::__construct();

        $encoders = [new JsonEncoder()];
        $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);
        $normalizers = [new ArrayDenormalizer(), new ObjectNormalizer(null, null, null, $extractor)];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    public function reflectToObject($responseBody, $objectType = AzureCVResponse::class)
    {
        return $this->serializer->deserialize($responseBody, $objectType, 'json');
    }
}
