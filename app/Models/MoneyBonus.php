<?php

namespace App\Models;


use App\Models\Entity\MoneyBonus as MoneyBonusEntity;

class MoneyBonus extends MoneyBonusEntity
{
    /**
     * @return mixed
     */
    public function getAvailableMoneyBonus()
    {
        return $this->where('count', '>', 0);
    }

    /**
     * @return mixed
     */
    public function getAvailableMoneyBonusCount()
    {
        return $this->getAvailableMoneyBonus()
            ->count();
    }

    /**
     * @return mixed
     */
    public function getAvailableMoneyBonusAsArray()
    {
        return $this->getAvailableMoneyBonus()
            ->get()
            ->toArray();
    }
}
