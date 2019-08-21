<?php

namespace App\Services;


class UserBonusService extends BaseService
{
    /**
     * @return int
     */
    public function getRandPointBonus() : int
    {
        $sumInterval = [0, 100];
        $sum = mt_rand(...$sumInterval);

        if ($sum <= 70) {
            $bonus = 500;
        } else if ($sum > 70 && $sum < 90) {
            $bonus = 1000;
        } else if ($sum > 90 && $sum < 99) {
            $bonus = 2500;
        } else {
            $bonus = 10000;
        }

        return $bonus;
    }
}
