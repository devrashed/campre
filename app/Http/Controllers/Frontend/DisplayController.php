<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect; 
use Illuminate\Support\Str;
use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Image;
use DB;

class DisplayController extends Controller
{
   public function homeproduct(){

   $data = Product::leftJoin('variants', 'variants.pro_id', '=','products.id')
   ->select('products.id as pid','products.slug as slug','products.status','variants.homepage','products.product_name as pname','variants.price as vprice', 'variants.image as vimage')
   ->where('products.status', '=', 'yes')
   ->where('variants.homepage', '=', 'yes')
   ->get();

   //->leftJoin('categories', 'categories.id' , '=','products.categoryID')
     //$viewproduct = Product::select('id','slug','product_name')
    //->get(); 
    //$data = Product::all();  
    //$data = DB::table('products')->get();
   // dd($viewproduct);
    //die();

   return view('frontend.home',compact('data'));     

    }

   public function detailsproduct(){

    $detailspro = Product::leftJoin('variants', 'variants.pro_id', '=','products.id')
    ->leftJoin('categories', 'categories.id' , '=','products.categoryID')
    ->select('products.id as pid','products.slug as slug','products.product_name as pname','categories.id as catid', 'categories.catname as catname', 'products.categoryID as pcatid','categories.id as cateid', 'variants.id as id','variants.varname as varname','variants.price as vprice','variants.homepage','variants.image as vimage')
    ->where('products.status', '=', 'yes')
    ->where('variants.homepage', '=', 'yes')
    ->get();

   return view('frontend.products',['detailspro' => $detailspro]);     

    }

 
  public function singlepro($id, $slug){

    $singlepro = Product::leftJoin('categories', 'categories.id' , '=','products.categoryID')
    ->leftJoin('variants', 'variants.pro_id', '=','products.id')
    ->select('products.id as pid','products.slug as slug','products.description','products.product_name as pname','categories.id as catid', 'categories.catname as catname', 'products.categoryID as pcatid','categories.id as cateid', 'variants.id as id','variants.varname as varname','products.status','variants.price as vprice', 'variants.image as vimage')
    ->where('products.id', '=', $id)
    ->where('products.status', '=', 'yes')
    ->first();

     /*var_dump($singlepro->pid);
     die();*/

    $data= Variant::where('variants.pro_id','=',$singlepro->pid)
    ->get();
    
    return view('frontend.single',['singlepro' => $singlepro, 'vdata' => $data ]);     

    }


    




}
