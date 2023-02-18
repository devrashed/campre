@extends('admin.layouts.app')
@section('title','Add New Product')
@section('content')


<main id="main" class="main">
  <div class="pagetitle"> <h1> Add New Product</h1> </div>
  <section class="section"> 
    <div class="row"> 
     <div class="col-lg-12"> 
      <div class="card"> 

     @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif 

    <form class="form-horizontal" action="{{URL::to('/procreate')}}"  method="post">  
                                   {{ csrf_field() }}

     <div class="card-body"> 
      <div class="row mb-3"> 
        <label class="col-sm-2 col-form-label" for="inputText">Product Name</label>

        <div class="col-sm-7"> 
          <input type="text" name="Productname" class="form-control"> 
          <small class="text-danger">{{ $errors->first('Productname') }}</small>

        </div>
      </div> 

      <div class="row mb-3"> 
        <label class="col-sm-2 col-form-label" for="inputText">Description</label>

        <div class="col-sm-7"> 
        <textarea class="productdescription" name="Description" id="exampleFormControlTextarea1" 
        rows="10" cols="30"></textarea>
          <small class="text-danger">{{ $errors->first('Description') }}</small>

        </div>
      </div> 

      <div class="row mb-3"> 
        <label class="col-sm-2 col-form-label" for="inputText">Category Name</label>

        <div class="col-sm-7"> 
          <select name="Categoryname" class="form-control">
            <option value="">--SELECT--<option>
              @foreach($data as $data)   
               <option value="{{$data->id}}">{{$data->catname}}</option>
              @endforeach 
          </select>
           <small class="text-danger">{{ $errors->first('Categoryname') }}</small>
        </div>
      </div> 


      <div class="row mb-3"> 
        <label class="col-sm-2 col-form-label" for="inputText">SKU</label>

        <div class="col-sm-7"> 
          <input type="text" name="Sku" class="form-control"> 
          <small class="text-danger">{{ $errors->first('Sku') }}</small>
        </div>
      </div>

   <div class="mb-3"> <button class="btn btn-primary" type="Submit">Submit</button> </div>  
    </div> <!-- end the -->
  </form>   

       </div>
    </div>
  </div>
</section>

</main><!-- End #main -->


@endsection
