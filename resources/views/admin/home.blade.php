@extends('admin.layouts.app')
@section('title','Welcome to Dashboard')
@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->




  <main id="main" class="main">
   <div class="pagetitle"> 
        <h1> Welcome to Dashboard </h1>
    </div>  
  </main><!-- End #main -->

       
@endsection
