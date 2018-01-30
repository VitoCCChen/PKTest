<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Curl\Curl;

class liveController extends Controller
{
    public function index(Request $request)
    {
        $curl_ep = new Curl();
        $curl_ep->setHeader('X-Requested-With', 'XMLHttpRequest');
        $curl_ep->setHeader('Content-Type', 'application/json');
        $curl_ep->get('http://pkfunapi.test/api/getEpisode', array(
            'page_num'=>'6',
            'page'=>$request['page'],
            'id'=>$request['id']
        ));

        $curl_pg = new Curl();
        $curl_pg->setHeader('X-Requested-With', 'XMLHttpRequest');
        $curl_pg->setHeader('Content-Type', 'application/json');
        $curl_pg->get('http://pkfunapi.test/api/getProgram', array(
            'id'=>$request['id']
        ));

        if ($curl_ep->error || $curl_pg->error) {
            echo 'Error: ' . $curl_ep->errorCode . ': ' . $curl_ep->errorMessage . "\n";
            echo 'Error: ' . $curl_pg->errorCode . ': ' . $curl_pg->errorMessage . "\n";
        } else {
            $results_ep = $curl_ep->response;
            $results_pg = $curl_pg->response;
            //dd( compact('results_ep', 'results_pg'));
        }

        return view('live.index', compact('results_ep', 'results_pg'));
    }
}


