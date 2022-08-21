<?php

namespace App\Http\Controllers;

use App\Http\Requests\dispatch;
use App\Models\depot\Depot;
use App\Models\distributer;
use Illuminate\Http\Request;

class DepotController extends Controller
{
    public function index(){
        $depot=Depot::get();
        $fid=distributer::get();
        return view("depot.index",compact("depot","fid"));
    }
    public function info($id){
        $d=Depot::find($id);
        return view("depot/info",compact("d"));

    }
}
