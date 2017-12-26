<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\{Stripe, Customer, Charge};

class PurchasesController extends Controller
{
	/**
	 * Perform the charge here
	 */
    public function store(Request $request)
    {
        //dd($request->all());

        Stripe::setApiKey(config('services.stripe.secret'));

        $customer = Customer::create(array(
            'email' => $request->get('stripeEmail'),
            'source'  => $request->get('stripeToken')
        ));

        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => 2500,
            'currency' => 'usd'
        ));

        var_dump($charge);
        echo '<h1>Successfully charged $25.00!</h1>';

    }
}
