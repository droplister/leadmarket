<?php

namespace App\Http\Controllers;

use App\Lead;

use Illuminate\Http\Request;

use App\Http\Requests;

class MarketController extends Controller
{
    /**
     * Show Market
     */
    public function index()
    {
        $leads = Lead::forSale()->orderBy('created_at', 'desc')->paginate(25);

        return view('market', compact('leads'));
    }
}
