<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'categoryID',
        'description',
        'sku',
        'status',
   ];

    public function variant()
    {
        return $this->hasOne('App\Models\Variant');
    }

}
