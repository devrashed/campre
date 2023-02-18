<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Product;
use Validator;
use App\Http\Resources\ProductResource;

class ProductapiController extends BaseController
{
   public function productapi(){
        $viewspro = Product::all();  
       return $this->sendResponse(ProductResource::collection($viewspro), 'Products retrieved successfully.');
     }

}
