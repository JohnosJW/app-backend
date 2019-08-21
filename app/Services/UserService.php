<?php

namespace App\Services;


use App\Models\User;

class UserService extends BaseService
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserService constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return bool
     */
    public function haveItemsOrMoney()
    {
        return $this->user->getUserBonuses()->count() ? true : false;
    }

    /**
     * @return mixed
     */
    public function getMoneyBonus()
    {
        return $this->user->getUserBonuses()->getMoneyBonus()->first();
    }
}
