<?php

namespace App\Http\Controllers;

use Auth;
use App\Lead;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Show Market
     */
    public function index()
    {
        $leads = Auth::user()->leads()->paginate(25);

        return view('contacts', compact('leads'));
    }
}
