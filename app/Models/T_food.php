<?php

namespace App\Models;
use App\Models\Listfood;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_food extends Model
{
    public function listfoods()
    {
        return $this->hasMany(Listfood::class,'Tfood_id','id');
    }
    use HasFactory;
}
