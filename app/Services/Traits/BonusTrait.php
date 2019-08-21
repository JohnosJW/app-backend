<?php

namespace App\Services\Traits;


trait BonusTrait
{
    /**
     * @param array $availableBonus
     * @param $value
     * @return null
     */
    protected function checkBonusInArray(array $availableBonus, $value)
    {
        /** @var  $checkBonusInArray */
        $checkBonusInArray = array_filter((array)$availableBonus, function ($item) use ($value) {
            return in_array($value, $item);
        });

        return $checkBonusInArray ? $value : null;
    }
}
