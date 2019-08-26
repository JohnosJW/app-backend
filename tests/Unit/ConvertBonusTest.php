<?php

namespace Tests\Unit;

use App\Models\MoneyBonus;
use App\Models\UserBonus;
use App\Services\UserService;
use Tests\TestCase;
use App\User;

class ConvertBonusTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testConvertUserMoneyBonusToPoints()
    {
        /** @var  $user */
        $user = factory(User::class)->create();

        /** @var  $moneyBonus */
        $moneyBonus = MoneyBonus::first();

        /** @var  $userBonus */
        $userBonus = factory(UserBonus::class)->create([
            'user_id' => $user->id,
            'money_bonus_id' => $moneyBonus->id,
            'type' => UserBonus::TYPE_MONEY
        ]);

        $this->actingAs($user, 'api');

        /** @var  $userService */
        $userService = app(UserService::class);


        /**
         * Test a Service Method (get expect data)
         *
         * @var  $points
         */
        $points = $userService->convertUserMoneyBonusToPoints();

        /** @var  $moneyBonus */
        $moneyBonus = (int) $moneyBonus->name;

        /**
         * Manually get need data
         *
         * @var  $expectPoints
         */
        $expectPoints = $moneyBonus * MoneyBonus::CONVERT_RATE;

        $userBonus->forceDelete();
        $user->delete();

        $this->assertSame($points, $expectPoints);
    }
}
