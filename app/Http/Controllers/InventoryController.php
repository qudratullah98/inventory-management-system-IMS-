<?php

namespace App\Http\Controllers;

use App\Http\Requests\costomvalidator;
use App\Models\catagory;
use App\Models\depot\Depot;
use App\Models\invoice;
use App\Models\invoice_item;
use App\Models\item;
use App\Models\unit;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class InventoryController extends Controller
{
    public function index()
    {
        $cat = catagory::get();
        $depot = Depot::get();
        $unit = unit::get();
        $data = invoice::get();
        return view("inventory.index", ["catagory" => $cat, "depot" => $depot, "unit" => $unit, "data" => $data]);
    }
    public function store(Request $req)
    {
        $req->validate([
            "invoice"=>"required",
            "remark"=>"required",
            "name.*"=>"required",
            "catagory.*"=>"required",
            "quntity.*"=>"required",
        ]);
        $inv = new invoice();
        $inv->invoice_number = $req->invoice;
        $inv->remark = $req->remark;
        if ($req->hasFile("image")) {
            $file = $req->file("image")->store("public/images");
            $inv->image = $file;
        }
        $inv->save();
        foreach ($req->name as $key => $value) {

            $item = item::where("name", $req->name[$key])->first();

            if ($item) {
                $item->total_quntity += $req->quntity[$key];
                $item->update();
                
                // dd($req->quntity);
            } else {
                $item = new item();
                $item->name = $req->name[$key];
                $item->total_quntity = $req->quntity[$key];
                $item->unit_id = $req->unit[$key];
                $item->catagory_id = $req->catagory[$key];
                $item->depot_id = $req->depot[$key];
                $item->save();
            }
            $invitm = new invoice_item();
            $invitm->item_id = $item->id;
            $invitm->invoice_id = $inv->id;
            $invitm->quntity = $req->quntity[$key];
            $invitm->save();
        }
        return back()->with(["message" => "Data inserted Successfull"]);
    }
    public function search(Request $req)
    {
        $s = $req->search;
        if ($s) {

            $ss = invoice::where("invoice_number", $s)->get();
            if ($ss) {

                $cat = catagory::get();
                $depot = Depot::get();
                $unit = unit::get();
                return view("inventory.index", ["catagory" => $cat, "depot" => $depot, "unit" => $unit, "data" => $ss]);
            } else {
                return back()->with(["error" => "Form Empty"]);
            }
        } else {
            return back()->with(["error" => "Form Empty"]);
        }
    }
    public function find($id)
    {
        $inv = invoice_item::where("invoice_id", $id)->get();
        return view("inventory.search", ["inv" => $inv]);
    }

}
