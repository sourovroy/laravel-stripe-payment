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
    	dd($request->all());
    }
}
