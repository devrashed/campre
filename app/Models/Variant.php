<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'pro_id',
        'varname',
        'homepage',
        'price',
        'image',
   ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
