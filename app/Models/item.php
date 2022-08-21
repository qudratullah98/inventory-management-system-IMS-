<?php

namespace App\Models;

use App\Models\depot\Depot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    public function unit(){
        return $this->belongsTo(unit::class,'unit_id','id');
    }
    public function catagory(){
        return $this->belongsTo(catagory::class);
        
    }
    public function depot(){
        return $this->belongsTo(Depot::class);
        
    } public function invoice_item(){
        return $this->hasOne(invoice_item::class);
    }
}
