<?php

namespace App\Api\Factory\Transformers;

use App\Api\Contract\Transformers\Transformer;

class FactoryTransformers
{
    /**
     * @param string $type
     * @return null|Transformer
     * @throws \Exception
     */
    public static function make(string $type): ?Transformer
    {
        $transformer = null;

        switch ($type) {
            default:
                throw new \Exception('Unknown transformer type - ' . $type);
        }

        return $transformer;
    }

}