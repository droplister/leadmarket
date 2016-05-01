<?php

namespace App\Http\Controllers;

use App\Lead;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

    /**
     * Purchase Lead
     */
    public function checkout(Request $request, $lead)
    {
        $lead = Lead::find($lead);

        $lead->update(['sold' => 1]);

        $lead->purchase()->update(['user_id' => $request->user()->id, 'paid_at' => Carbon::now()]);

        return redirect(route('contacts'))->with('success', $lead->id);
    }
}
