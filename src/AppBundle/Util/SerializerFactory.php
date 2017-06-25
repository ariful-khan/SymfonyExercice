<?php

namespace AppBundle\Util;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerFactory
{
    /**
     * @param null $circularReferenceHandler
     * @return Serializer
     */
    public function getSerializer($circularReferenceHandler = null): Serializer
    {
        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();

        if (is_callable($circularReferenceHandler)) {
            $normalizer->setCircularReferenceHandler($circularReferenceHandler);
        }

        return new Serializer(array($normalizer), array($encoder));
    }
}
