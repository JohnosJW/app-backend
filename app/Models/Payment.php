<?php

namespace App\Models;


use Stripe\Stripe;

class Payment extends Stripe
{
    /** @var string */
    const CURRENCY_USD = "usd";

    /** @var string */
    const PAYMENT_METHOD_TYPE_CARD = "card";

    /**
     * Payment constructor.
     */
    public function __construct()
    {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        parent::setApiKey(env('STRIPE_KEY'));
    }
}
