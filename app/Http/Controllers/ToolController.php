<?php

namespace App\Http\Controllers;

use Artisan;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests;

class ToolController extends Controller
{
    /**
     * Simuate Data
     */
    public function getSimulate()
    {
        Artisan::call('insert:rows', [
            'count' => 315
        ]);

        return redirect(route('admin::index'));
    }

    /**
     * Destroy Data
     */
    public function getCleanup()
    {
        Artisan::call('migrate:rollback');
        Artisan::call('migrate');

        return redirect(route('admin::index'));
    }
}
