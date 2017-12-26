<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
