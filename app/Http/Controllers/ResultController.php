<?php

namespace App\Http\Controllers;

use Curl\Curl;
use Illuminate\Http\Request;

use App\Http\Requests;

class ResultController extends Controller
{
    public function __construct()
    {
        $this->curl = new Curl();
        $this->curl->setHeader('X-Username', 'dan@droplister.com');
        $this->curl->setHeader('X-Api-Key', 'Hh8egXtMjWJAHcQsxSSI7n0VTLS8YDGaIxOM5TCuQeg=');
        $this->curl->setHeader('Content-Type', 'application/json');
    }

    public function getResults()
    {
        $data = array(
            'datastoreId' => '592',
            'extra' => 'data',
        );

        $request = json_encode($data);

        $this->curl->post('https://api.tierion.com/v1/records', $request);

        if ($this->curl->error) {
            return $this->curl->error_code;
        }

        return $this->curl->response;
    }
}
