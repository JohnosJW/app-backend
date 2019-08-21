<?php

namespace App\Models;


use App\Helpers\ObjectHelper;
use App\Services\ItemService;
use App\Services\MoneyBonusService;
use App\Services\UserBonusService;
use App\Services\UserService;

class Game
{
    /** @var string  */
    const TYPE_POINTS = 'points';

    /** @var string  */
    const TYPE_MONEY = 'money';

    /** @var string  */
    const TYPE_ITEM = 'item';

    /** @var UserService  */
    private $userService;

    /** @var ItemService  */
    private $itemService;

    /** @var MoneyBonusService  */
    private $moneyBonusService;

    /** @var UserBonusService  */
    private $userBonusService;

    /**
     * Game constructor.
     * @param UserService $userService
     * @param ItemService $itemService
     * @param MoneyBonusService $moneyBonusService
     * @param UserBonusService $userBonusService
     */
    public function __construct
    (
        UserService $userService,
        ItemService $itemService,
        MoneyBonusService $moneyBonusService,
        UserBonusService $userBonusService
    )
    {
        /** @var  userService */
        $this->userService = $userService;

        /** @var  itemService */
        $this->itemService = $itemService;

        /** @var  moneyBonusService */
        $this->moneyBonusService = $moneyBonusService;

        /** @var  userBonusService */
        $this->userBonusService = $userBonusService;
    }

    /**
     * @return int|string
     */
    public function getRandBonus()
    {
        /** @var  $haveUserItemsOrMoney */
        $haveUserItemsOrMoney = $this->userService->haveItemsOrMoney();

        /**
         * Check user have bonus like item or money
         * if have then return bonus like points
         */
        if ($haveUserItemsOrMoney) {
            return $this->userBonusService->getRandPointBonus();
        }

        /** @var  $hasBonusItems */
        $hasBonusItems = $this->itemService->hasItems();

        /** @var  $hasBonusMoney */
        $hasBonusMoney = $this->moneyBonusService->hasMoneyBonuses();

        /**
         * Check have bonus like item or money yet
         * if haven't then return bonus like points
         */
        if ($hasBonusItems || $hasBonusMoney) {

            $randMethods = mt_rand(1, 3);

            if ($randMethods === 1) {
                return $this->moneyBonusService->getAvailableBonus()
                    ? ObjectHelper::toArray(self::TYPE_MONEY, $this->moneyBonusService->getAvailableBonus())
                    : ObjectHelper::toArray(self::TYPE_POINTS, $this->userBonusService->getRandPointBonus());
            } else if ($randMethods === 2) {
                return $this->itemService->getAvailableBonus()
                    ? ObjectHelper::toArray(self::TYPE_ITEM, $this->itemService->getAvailableBonus())
                    : ObjectHelper::toArray(self::TYPE_POINTS, $this->userBonusService->getRandPointBonus());
            }
        }

        return ObjectHelper::toArray(self::TYPE_POINTS, $this->userBonusService->getRandPointBonus());
    }
}
