<?php

namespace App\Services;


use App\Models\MoneyBonus;
use App\Models\Payment;
use App\Models\UserBonus;
use Stripe\PaymentIntent;

class PaymentService extends BaseService
{
    /** @var Payment */
    private $payment;

    /** @var UserService */
    private $userService;

    /**
     * PaymentService constructor.
     * @param Payment $payment
     */
    public function __construct(Payment $payment, UserService $userService)
    {
        /** @var payment */
        $this->payment = $payment;

        /** @var userService */
        $this->userService = $userService;
    }

    /**
     * @return PaymentIntent|null
     */
    public function send() :? PaymentIntent
    {
        $approvalUserMoneyBonus = $this->userService->getApprovalMoneyBonus();

        if (!$approvalUserMoneyBonus && !isset($approvalUserMoneyBonus->money_bonus_id)) {
            return null;
        }

        try {
            /** @var $moneyBonus */
            $moneyBonus = MoneyBonus::getById($approvalUserMoneyBonus->money_bonus_id)->first();

            /** @var $amount */
            $amount = (int)$moneyBonus->name;

            /** @var $email */
            $email = $this->userService->user->email;

            /** Send Request to API Stripe Pay System (Test Data) wallet info get from wallet table */
            $response = PaymentIntent::create([
                'amount' => $amount,
                'currency' => Payment::CURRENCY_USD,
                'payment_method_types' => [Payment::PAYMENT_METHOD_TYPE_CARD],
                'receipt_email' => $email,
            ]);

            $approvalUserMoneyBonus->status = UserBonus::STATUS_ENDED;
            $approvalUserMoneyBonus->save();

            return $response;
        } catch (\Exception $e) {
            print_r($e);

            return null;
        }
    }
}
