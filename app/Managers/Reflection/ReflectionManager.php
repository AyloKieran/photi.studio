<?php

namespace App\Managers\Reflection;

use App\Managers\BaseManager;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;

class ReflectionManager extends BaseManager
{
    function __construct()
    {
        parent::__construct();
    }

    private function getSerializer()
    {

        $encoders = [new JsonEncoder()];
        $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);
        $normalizers = [new ArrayDenormalizer(), new ObjectNormalizer(null, null, null, $extractor)];

        return new Serializer($normalizers, $encoders);
    }

    public function reflectToObject($responseBody, $objectType)
    {
        return $this->getSerializer()->deserialize($responseBody, resolve($objectType)::class, 'json');
    }
}
