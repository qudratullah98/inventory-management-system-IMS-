<?php

namespace App\Http\Controllers;

use App\Http\Requests\dispatch;
use App\Models\catagory;
use App\Models\distributer;
use App\Models\invoice_item;
use App\Models\item;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class dispatchController extends Controller
{
    public function index()
    {
        $fid = distributer::get();
        $item = item::get();
        return view("dispatch.index", compact("fid", "item"));
    }
    public function select($id)
    {
        $item = item::with('unit', "catagory")->find($id);

        return response()->json(["item" => $item]);
    }
    public function store(Request $req)
    {
        
       
       $req->validate([
        "item.*"=>"required",
        "catagory.*"=>"required",
        "unit.*"=>"required",
        "quntity.*"=>"required",
        "fiducial"=>"required",
       ]);
      
        
             $distributer = $req->fiducial;
            foreach ($req->item as $key => $value) {
                $item = item::find($req->item[$key]);
                if ($req->quntity[$key]+1 > $item->total_quntity) {
                    return back()->with(["message" => "We dont Have enogh Items"]);
                    
                } else {
                    $item->total_quntity-=$req->quntity[$key];
                    $item->update();
                    $ord = new order();
                    $ord->quntity = $req->quntity[$key];
                    $ord->item_id = $req->item[$key];
                    $ord->distributer_id = $distributer;
                    $ord->save();
                    return back()->with(["message" => "Item Distributed Successfull"]);
                }
            }
        
       
    }
}
