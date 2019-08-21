<?php

namespace App\Services;


use App\Models\ItemBonus;
use App\Services\Traits\BonusTrait;

class ItemService extends BaseService
{
    use BonusTrait;

    /** @var string  */
    const BONUS_SCREEN_PROTECTION = 'Screen Protection';

    /** @var string  */
    const BONUS_IPHONE_CASE = 'Iphone case';

    /** @var string  */
    const BONUS_AIR_PODS = 'AirPods';

    /** @var string  */
    const BONUS_IPHONE = 'iPhone';

    /**
     * @var ItemBonus
     */
    private $itemBonus;

    /**
     * ItemService constructor.
     * @param ItemBonus $itemBonus
     */
    public function __construct(ItemBonus $itemBonus)
    {
        $this->itemBonus = $itemBonus;
    }

    /**
     * @return bool
     */
    public function hasItems()
    {
        return $this->itemBonus->getAvailableItemsCount() > 0 ? true : false;
    }

    public function getAvailableBonus()
    {
        /** @var  $availableBonus */
        $availableBonus = $this->itemBonus->getAvailableItemBonusAsArray();

        $sumInterval = [0, 10000];
        $sum = mt_rand(...$sumInterval);

        if ($sum <= 9000) {
            return $this->checkBonusInArray((array)$availableBonus, self::BONUS_SCREEN_PROTECTION);
        } else if ($sum > 9000 && $sum < 9990) {
            return $this->checkBonusInArray((array)$availableBonus, self::BONUS_IPHONE_CASE);
        } else if ($sum > 9990 && $sum < 9999) {
            return $this->checkBonusInArray((array)$availableBonus, self::BONUS_AIR_PODS);
        }

        return $this->checkBonusInArray((array)$availableBonus, self::BONUS_IPHONE);
    }
}
