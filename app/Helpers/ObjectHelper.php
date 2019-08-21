<?php

namespace App\Helpers;


class ObjectHelper
{
    /**
     * @param string $type
     * @param $value
     * @return array
     */
    public static function toArray(string $type, $value) : array
    {
        return [
            'type' => $type,
            'value' => $value
        ];
    }
}
