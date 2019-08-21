<?php

namespace App\Models;

use App\User as UserBase;

class User extends UserBase
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getUserBonuses()
    {
        return $this->hasMany('App\Models\UserBonus');
    }
}
