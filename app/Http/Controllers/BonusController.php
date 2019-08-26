<?php

namespace App\Http\Controllers;


use App\Http\Resources\Bonus as BonusResource;
use App\Services\UserService;

class BonusController extends Controller
{
    /**
     * @param UserService $userService
     * @return BonusResource
     */
    public function convertMoneyBonusToPoints(UserService $userService) : BonusResource
    {
        return new BonusResource($userService->convertUserMoneyBonusToPoints());
    }
}
