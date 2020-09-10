<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;

class RatesController extends Controller
{

    public function index()
    {
        return response()->json(Currency::get());
    }
}
