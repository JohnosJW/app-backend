<?php

namespace App\Models;


use App\Models\Entity\ItemBonus as ItemBonusEntity;

class ItemBonus extends ItemBonusEntity
{
    /**
     * @return mixed
     */
    public function getAvailableItems()
    {
        return $this->where('count', '>', 0);
    }

    /**
     * @return mixed
     */
    public function getAvailableItemsCount()
    {
        return $this->getAvailableItems()->count();
    }

    /**
     * @return mixed
     */
    public function getAvailableItemBonusAsArray()
    {
        return $this->getAvailableItems()
            ->get()
            ->toArray();
    }
}
