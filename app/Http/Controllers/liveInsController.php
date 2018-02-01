<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Curl\Curl;

class liveInsController extends Controller
{
    public function index($id){
        $curl = new Curl();
        $curl->setHeader('X-Requested-With', 'XMLHttpRequest');
        $curl->setHeader('Content-Type', 'application/json');
        $curl->get('http://api.pkfun.xyz/api/getEpisode/'.$id);



        if ($curl->error) {
            echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        } else {

            $result = $curl->response;
            if(count($result->result->data) == 0){
                return '404 not found!';
            }
            $data = $result->result->data[0];

//            dd( compact('results_ep', 'results_pg'));

        }

        return view('live_ins.index', compact('data'));
    }
}
