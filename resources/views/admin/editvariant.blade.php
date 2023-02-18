@extends('admin.layouts.app')
@section('title','Edit Varaint Product')
@section('content')


<main id="main" class="main">
  <div class="pagetitle"> <h1> Edit Varaint Product</h1> </div>
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

    <form class="form-horizontal" action="{{url('varintupdate', [$data->vid])}}"  method="post" enctype="multipart/form-data">  
                                   {{ csrf_field() }}

     <div class="card-body"> 

       <div class="row mb-3"> 
        <label class="col-sm-2 col-form-label" for="inputText">Product Name</label>

        <div class="col-sm-7"> 
          <select name="Productname" class="form-control">  
               <option value="{{$data->pid}}">{{$data->pname}}</option>
              @foreach($viewpro as $vdata)  
               <option value="{{$vdata->id}}">{{$vdata->product_name}}</option>
              @endforeach 
          </select>
           <small class="text-danger">{{ $errors->first('Productname') }}</small>
        </div>
      </div> 

      <div class="row mb-3"> 
        <label class="col-sm-2 col-form-label" for="inputText">Variant Name</label>
        <div class="col-sm-7"> 
          <input type="text" name="Varaintname" class="form-control" value="{{$data->varname}}"> 
          <small class="text-danger">{{ $errors->first('Varaintname') }}</small>

        </div>
      </div> 

      <div class="row mb-3"> 
        <label class="col-sm-2 col-form-label" for="inputText">Price</label>
        <div class="col-sm-7"> 
          <input type="text" name="Price" class="form-control" value="{{$data->vprce}}"> 
          <small class="text-danger">{{ $errors->first('Price') }}</small>
        </div>
      </div> 

      <div class="row mb-3"> 
        <label class="col-sm-2 col-form-label" for="inputText">Home Page </label>
        <div class="col-sm-7"> 
           <input type="checkbox" id="invalidCheck2" name="homedisplay" checked value="yes">
        </div>
      </div> 

      <div class="row mb-3"> 
        <label class="col-sm-2 col-form-label" for="inputText">image</label>

        <div class="col-sm-7"> 
          <input type="file" name="simage" class="form-control" > 
        <small class="text-danger">{{ $errors->first('simage') }}</small>

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
