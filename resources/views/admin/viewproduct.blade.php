@extends('admin.layouts.app')
@section('title','View Product list')
@section('content')

  <main id="main" class="main">
   <div class="pagetitle"> 
        <h1> View ALL Product</h1>
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
                <th scope="col">SKU</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewpro as $viewpro)
            <tr> 
                <td>{{ $loop->index + 1 }}</td>
                <td>{{$viewpro->product_name}}</td>
                <td>{{$viewpro->catname}}</td>
                <td>{{$viewpro->sku}}</td>
                <td> <a href="./proedit/{{$viewpro->pid}}"><i title="Edit" class="ri-edit-2-fill"></i></a> &nbsp &nbsp <a href="./delpro/{{$viewpro->pid}}" onclick="delproduct()"><i title="Delete" class="ri-chat-delete-fill"></i></a></td>
            </tr>
            @endforeach
        </tbody>    
    </table>
        </div>             
    </div>
</div>
</section>  


<script>


function delproduct()
{
  return confirm("Are you sure you want to this Product?");
}  

</script>  

  </main><!-- End #main -->

       
@endsection
