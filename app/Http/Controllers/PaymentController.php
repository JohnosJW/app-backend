<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    /**
     * @param PaymentService $paymentService
     * @return PaymentIntent|null
     */
    public function send(PaymentService $paymentService) :? PaymentIntent
    {
        return $paymentService->send();
    }
}
