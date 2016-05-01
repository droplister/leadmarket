<?php

namespace App\Http\Controllers;

use App\Lead;
use Curl\Curl;
use App\Purchase;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests;

class CaptureController extends Controller
{
    public function __construct()
    {
        $this->curl = new Curl();
        $this->curl->setHeader('X-Username', 'dan@droplister.com');
        $this->curl->setHeader('X-Api-Key', 'Hh8egXtMjWJAHcQsxSSI7n0VTLS8YDGaIxOM5TCuQeg=');
        $this->curl->setHeader('Content-Type', 'application/json');
    }

    /**
     * Get a Lead
     */
    public function getLead()
    {
        return view('capture');
    }

    /**
     * Store Lead
     */
    public function postLead(Request $request)
    {
        $lead = Lead::create([
            'name' => $request->name,
            'email' => $request->email,
            'income' => $request->income,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode
        ]);
        $purchase = Purchase::create([
            'lead_id' => $lead->id,
            'price' => 1,
            'status' => 'available'
        ]);

        $record = array(
            'datastoreId' => '622',
            'name' => $request->name,
            'email' => $request->email,
            'income' => $request->income,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode
        );

        $request = json_encode($record);

        $this->curl->post('https://api.tierion.com/v1/records', $request);

        if ($this->curl->error) {
            // Fail Quietly
        }
        else
        {
            $response = json_decode($this->curl->response);
            $lead->update(['sha256' => $response->sha256]);
        }

        return redirect(route('success'));
    }

    /**
     * Get Success
     */
    public function getSuccess()
    {
        return view('success');
    }
}
