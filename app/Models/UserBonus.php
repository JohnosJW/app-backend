<?php

namespace App\Models;


use App\Models\Entity\UserBonus as UserBonusEntity;

class UserBonus extends UserBonusEntity
{
    /** @var string  */
    const TYPE_MONEY = 'money';

    /** @var string  */
    const TYPE_ITEM = 'item';

    /** @var string  */
    const STATUS_APPROVAL = 'approval';

    /** @var string  */
    const STATUS_ENDED = 'ended';
}
