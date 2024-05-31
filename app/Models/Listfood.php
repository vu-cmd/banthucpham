<?php

namespace App\Models;
use App\Models\T_food;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listfood extends Model
{
    public function t_foods()
    {
        return $this->belongsTo(T_food::class,'Tfood_id','id');
    }
    use HasFactory;
}
