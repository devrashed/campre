<?php

namespace App\Http\Controllers\admin;
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
use Session;
use Cache;



class ProductController extends Controller
{
    
    public function addnewcate()
    {     
        return view('admin.newcategory');
    }

     public function Catstore(Request $request)
    {
     
        $rules = [
           'Category' => 'required',
        ];

        $this->validate($request, $rules);


         $data = new Category([
        'catname' => $request->get('Category'),
        ]);

      $data->save();
     // return redirect('/addcat')->with('success', 'New User Create Successfully');
      return back()->with('success','Category Sucessfully Create');

    }

  public function viewcat()
    {
       $viewcat = Category::all(); 
       return view('admin.viewcategory',['viewcat' => $viewcat]); 
    }

  public function delcat($id)
    {
       $delcat=Category::where('id',$id)->delete();
       return redirect('/viewcat')->with('success','Category Delete Successfull'); 
    }

  public function catedit($id)
    {
        $data=Category::findorfail($id);
        return view('admin.editcategory',['data' => $data]);
    } 

     public function cateupdate(Request $request, $id)
    {  
      $data = Category::find($id);
      $data->catname=$request->input('Category');
      $data->save();    
      return redirect('/viewcat')->with('success', 'Successfully update Data');
     }

    public function storeproduct(){
       $data = Category::all();  
       return view('admin.addnewProduct',['data' => $data]);
            
    }

    public function procreate(Request $request){
       $status = 'yes';

        $request->validate(
            [
               'Productname' => 'required',
               'Description' => 'required',
               'Categoryname' => 'required',
               'Sku'         => 'required',
            ], 
          $rules = [
            'Productname.required' => 'Product Name is Required',
            'Description.required' => 'Product Description is Required',
            'Categoryname.required' => 'Product Category is Required',
            'Sku.required' => 'Product SKU is Required',

            ]
        );  

        $this->validate($request, $rules);

        $data = new Product([
        'product_name' => $request->get('Productname'),
        'description' => $request->get('Description'),
        'categoryID' => $request->get('Categoryname'),
        'slug' => Str::slug($request->get('Productname'),'-'),
        'sku' => $request->get('Sku'),
        'status' => $status,
        ]);
        $data->save(); 
        return redirect('/addproduct')->with('success', 'Successfully update Data');

      }

     public function viewproduct(){ 
       //$viewpro = Product::all();  
        $viewpro = Product::leftJoin('categories', 'categories.id' , '=','products.categoryID')
        ->select('products.id as pid','products.slug as slug','products.product_name','categories.id as catid', 'categories.catname', 'products.categoryID','products.sku')
        ->where('products.status', '=', 'yes')
        ->get();

       return view('admin.viewproduct',['viewpro' => $viewpro]);    
     }   


    public function delpro($id) {
       $delcat=Product::where('id',$id)->delete();
       return redirect('/viewproduct')->with('success','Product Delete Successfull'); 
    }

    public function proedit($id){

       $data = Product::where('Products.id', $id)
       ->leftJoin('categories', 'categories.id', '=', 'Products.categoryID' )
       ->select('Products.id as pid','Products.product_name as pname','categories.id as catid', 'categories.catname as catname', 'Products.categoryID as pcatid','Products.description as desp','Products.sku as sku','Products.status as status')
       ->first();
        $viewcat = Category::all();
       return view('admin.edit_product',['data' => $data, 'viewcat' => $viewcat]);      
    }


    public function Productupdate(Request $request, $id)
    {  
      $data =Product::find($id);     
      $data->product_name=$request->get('Productname');
      $data->description=$request->get('Description'); 
      $data->slug=Str::slug($request->get('Productname'),'-');
      $data->categoryID=$request->get('Categoryname');
      $data->sku=$request->get('Sku');
      $data->status=$request->get('status'); 
      $data->save();    
      return redirect('/viewproduct')->with('success', 'Successfully Update Data');
     } 

    public function storevariant() {
       $viewpro = Product::all(); 
       return view('admin.addnewvariant',['viewpro' => $viewpro]);    
    }                   

    
    public function createvariant(Request $request){
    
      $request->validate(
             [
                'Productname' => 'required',
                'Varaintname' => 'required',
                'Price' => 'required|numeric',
                'simage' => 'required',
             ], 
            $rules = [
                'Productname.required' => 'Product Name is Required',
                'Varaintname.required' => 'Product Variant is Required',
                'Price.required' => 'Product Price is Required',
                'simage.required' => 'Product image is Required',

            ]
        );  

        $this->validate($request, $rules);

    $fileName=makeWebp($request,'simage', '', 'path', 80);
    
    $data = Variant::create([   
        'pro_id' => $request->get('Productname'),
        'varname' => $request->get('Varaintname'),
        'homepage' => $request->get('homedisplay'),
        'price' => $request->get('Price'),
        'image' => $fileName,  
    ]);
      $data->save();    
      return redirect('/storevariant')->with('success','Product Variant Add Successfull'); 
    }    


     public function viewVariant(){ 
       $viewaddons = Variant::leftJoin('Products', 'Products.id', '=', 'Variants.pro_id')
       ->leftJoin('categories', 'categories.id', '=', 'Products.categoryID' )
       ->select('Products.id as pid','Products.product_name as pname','categories.id as catid', 'categories.catname as catname', 'Products.categoryID as pcatid','categories.id as cateid', 'Variants.id as id','Variants.varname as varname','Variants.homepage','Variants.price as vprce', 'Variants.image as vimage')
       ->get();
       return view('admin.viewvariant',['viewaddons' => $viewaddons]);    
     }   
    
     public function delvariant($id) {
        $delitem=Variant::where('id',$id)->delete();
        return redirect('/viewvariant')->with('success','Product Delete Successfull'); 
     }


    public function editVariant($id){ 
       $data = Variant::where('Variants.id', $id)
       ->leftJoin('Products', 'Products.id', '=', 'Variants.pro_id')
       ->leftJoin('categories', 'categories.id', '=', 'Products.categoryID' )
       ->select('Products.id as pid','Products.product_name as pname','categories.id as catid', 'categories.catname as catname', 'Products.categoryID as pcatid','categories.id as cateid','Variants.varname as varname','Variants.id as vid','Variants.price as vprce', 'Variants.image as vimage')
       ->first();
       $viewpro = Product::all(); 

       $checkdata=Variant::where('Variants.id', $id)
       ->where('homepage', 'yes')
       ->first();  
    
       return view('admin.editvariant',['data' => $data, 'viewpro' => $viewpro, 'checkdata'=> $checkdata]);    
     }  
    
     public function varintupdate(Request $request, $id)
    {  
      $fileName=makeWebp($request,'simage', '', 'path', 80);  
      
      $data = Variant::find($id);     
      $data->pro_id=$request->get('Productname');
      $data->varname=$request->get('Varaintname'); 
      $data->homepage=$request->get('homepage');
      $data->price=$request->get('Price');
      $data->image=$fileName;

      $data->save();    
      return redirect('/viewvariant')->with('success', 'Successfully Update Data');
     }   

     
}
