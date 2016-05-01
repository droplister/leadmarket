<?php

namespace App\Http\Controllers;

use Artisan;
use App\Row;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests;

class ToolController extends Controller
{

    // FRONT-END

    /**
     * Capture a Lead
     */
    public function getCapture()
    {
        return view('capture');
    }

    /**
     * Lead Market
     */
    public function getMarket()
    {
        $leads = Row::all();

        return view('market', compact('leads'));
    }

    // BACK-END

    /**
     * Database Viewer
     */
    public function getDatabase()
    {
        $leads = Row::all();

        return view('database', compact('leads'));
    }

    /**
     * Replicate Database
     */
    public function getReplicator()
    {
        return view('replicator');
    }

    // BACK-END (TOOLS)

    /**
     * Simuate Data
     */
    public function getSimulate()
    {
        Artisan::call('insert:rows', [
            'count' => 5
        ]);

        return redirect('/database');
    }

    /**
     * Destroy Data
     */
    public function getCleanup()
    {
        Artisan::call('migrate:rollback');
        Artisan::call('migrate');

        return redirect('/database');
    }
}
