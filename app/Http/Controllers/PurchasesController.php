<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\{Customer, Charge};

class PurchasesController extends Controller
{
	/**
	 * Perform the charge here
	 */
    public function store(Request $request)
    {
        $customer = Customer::create(array(
            'email' => $request->get('stripeEmail'),
            'source'  => $request->get('stripeToken')
        ));

        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => 2500,
            'currency' => 'usd'
        ));

        response()->json($charge);
    }
}
