@extends('admin.layouts.app')
@section('content')


<main id="main" class="main">
  <div class="pagetitle"> <h1> Update Category</h1> </div>
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
<form class="form-horizontal" action="{{url('udpatcate', [$data->id])}}"  method="post">  
                                 {{ csrf_field() }}

    <div class="card-body"> 
      <div class="row mb-3"> 
      <label class="col-sm-2 col-form-label" for="inputText">Category Name:</label>

     <div class="col-sm-6"> 
      
      <input type="text" name="Category" class="form-control" value="{{$data->catname}}"> 
     <!--  <small class="text-danger">{{ $errors->first('Category') }}</small> -->
       
     </div>
      </div>

       <div class="mb-3"> <button class="btn btn-primary" type="Submit">Update</button> </div>  

    </div> <!-- end the -->
</form>   

       </div>
    </div>
  </div>
</section>

</main><!-- End #main -->


@endsection
