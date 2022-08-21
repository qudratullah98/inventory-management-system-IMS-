<?php

namespace App\Models\depot;

use App\Models\Employe\employe;
use App\Models\inventory;
use App\Models\item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    use HasFactory;
    public function item(){
        return $this->hasMany(item::class);
    }
  
}
