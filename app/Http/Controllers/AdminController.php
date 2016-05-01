<?php

namespace App\Http\Controllers;

use App\Lead;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Admin Index
     */
    public function index()
    {
        $leads = Lead::all();

        return view('admin', compact('leads'));
    }
}
