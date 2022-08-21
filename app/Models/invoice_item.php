<?php

namespace App\Models;

use App\Models\depot\Depot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_item extends Model
{
    use HasFactory;
    public function invoice(){
        return $this->belongsTo(invoice::class);
    }
     public function item(){
        return $this->belongsTo(item::class);
    }
   
}
