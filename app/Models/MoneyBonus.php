<?php

namespace App\Models;


use App\Models\Entity\MoneyBonus as MoneyBonusEntity;

class MoneyBonus extends MoneyBonusEntity
{
    /** @var int  */
    const CONVERT_RATE = 10;

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

    /**
     * @param int $id
     * @return mixed
     */
    public static function getById(int $id)
    {
        return self::where(['id' => $id]);
    }
}
