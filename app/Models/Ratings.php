<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function allplants()
    {
        return $this->belongsTo(AllPlants::class);
    }
}
