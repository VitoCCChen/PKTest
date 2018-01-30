<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class liveInsController extends Controller
{
    public function index(){
        return view('live_ins.index');
    }
}
