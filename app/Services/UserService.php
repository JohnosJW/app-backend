<?php

namespace App\Services;


use App\Models\MoneyBonus;
use App\Models\User;

class UserService extends BaseService
{
    /**
     * @var User
     */
    public $user;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        try {
            $user = auth()->userOrFail();
            $this->user = $user;
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return bool
     */
    public function haveItemsOrMoney() : bool
    {
        return $this->user->getUserBonuses()->count() ? true : false;
    }

    /**
     * @return int
     */
    public function convertUserMoneyBonusToPoints() : int
    {
        $userMoneyBonus = $this->getMoneyBonus();
        $userPoints = $userMoneyBonus ? $userMoneyBonus * MoneyBonus::CONVERT_RATE : 0;

        /**
         * Logic for save results
         *
         * try {
         *
         *  User $user{money:points} ->update() AND ->save(DB)
         * ...
         * }
         * catch {
         *  new Exception
         * ...
         * }
         *
         */

        return $userPoints;
    }

    /**
     * @return int
     */
    public function getMoneyBonus() : int
    {
        $userMoneyBonus = $this->user->getMoneyBonus()->first();
        $moneyBonus = MoneyBonus::getById($userMoneyBonus->money_bonus_id)->first();
        return (int) $moneyBonus->name ?? 0;
    }

    /**
     * @return mixed
     */
    public function getApprovalMoneyBonus()
    {
        return $this->user->getApprovalMoneyBonus()->first();
    }
}
