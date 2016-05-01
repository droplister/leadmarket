<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests;

class CaptureController extends Controller
{
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
    public function postLead()
    {
        // Stuff
    }

}
