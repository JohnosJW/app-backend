<?php

namespace App\Services;


use App\Models\MoneyBonus;
use App\Services\Traits\BonusTrait;

class MoneyBonusService extends BaseService
{
    use BonusTrait;

    /** @var int  */
    const BONUS_5 = 5;

    /** @var int  */
    const BONUS_10 = 10;

    /** @var int  */
    const BONUS_25 = 25;

    /** @var int  */
    const BONUS_100 = 100;

    /**
     * @var MoneyBonus
     */
    private $moneyBonus;

    /**
     * MoneyBonusService constructor.
     * @param MoneyBonus $moneyBonus
     */
    public function __construct(MoneyBonus $moneyBonus)
    {
        $this->moneyBonus = $moneyBonus;
    }

    /**
     * @return bool
     */
    public function hasMoneyBonuses()
    {
        return $this->moneyBonus->getAvailableMoneyBonusCount() > 0;
    }

    public function getAvailableBonus()
    {
        /** @var  $availableBonus */
        $availableBonus = $this->moneyBonus->getAvailableMoneyBonusAsArray();

        $sumInterval = [0, 1000];
        $sum = mt_rand(...$sumInterval);

        if ($sum <= 700) {
            return $this->checkBonusInArray((array)$availableBonus, self::BONUS_5);
        } else if ($sum > 700 && $sum < 900) {
            return $this->checkBonusInArray((array)$availableBonus, self::BONUS_10);
        } else if ($sum > 900 && $sum < 999) {
            return $this->checkBonusInArray((array)$availableBonus, self::BONUS_25);
        }

        return $this->checkBonusInArray((array)$availableBonus, self::BONUS_100);
    }
}
