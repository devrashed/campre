@extends('admin.layouts.app')
@section('title','View ALL Variant Product')
@section('content')

  <main id="main" class="main">
   <div class="pagetitle"> 
        <h1> View ALL Variant Product</h1>
    </div>
 

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

    <div class="card-title"> </div>

    <table class="table">  
        <thead> 
            <tr> 
                <th scope="col">#</th>
                <th scope="col">Product Name </th>
                <th scope="col">Category Name</th>
                <th scope="col">Variant Name</th>
                <th scope="col">Display</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewaddons as $viewaddons)
            <tr> 
                <td>{{ $loop->index + 1 }}</td>
                <td>{{$viewaddons->pname}}</td>
                <td>{{$viewaddons->catname}}</td>
                <td>{{$viewaddons->varname}}</td>
                <td>{{$viewaddons->homepage}}</td>
                <td>{{$viewaddons->vprce}}</td>
                <td><img src="{{$viewaddons->vimage}}" width="80" height="80"></td>
                <td> <a href="./editvariant/{{$viewaddons->id}}"><i title="Edit" class="ri-edit-2-fill"></i></a> &nbsp &nbsp <a href="./delvariant/{{$viewaddons->id}}" onclick="delvariant()"><i title="Delete" class="ri-chat-delete-fill"></i></a></td>
            </tr>
            @endforeach
        </tbody>    
    </table>
        </div>             
    </div>
</div>
</section>  

<script>

function delvariant()
{
  return confirm("Are you sure you want to this Product?");
}  

</script>

  </main><!-- End #main -->

       
@endsection
