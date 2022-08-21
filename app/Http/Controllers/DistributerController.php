<?php

namespace App\Http\Controllers;

use App\Models\distributer;
use App\Models\item;
use Illuminate\Http\Request;

class DistributerController extends Controller
{
    public function index(){
        $fid=distributer::get();
        return view("fiducial.index",compact("fid"));
    }
    public function search(Request $req){
        $fid=distributer::where("name","like","%$req->search%")->get();
        return view("fiducial.index",compact("fid"));


    }
    public function info($id){
         $info=distributer::find($id);
        return view("fiducial.info",compact("info"));
    }
    public function search2(Request $req){
        
        $fid=distributer::where("name","like","%$req->search%")->get();
       
        $item = item::get();
        return view("dispatch.index",compact("fid", "item"));
    }
}
