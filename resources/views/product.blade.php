
  @extends('layouts.app')
  
  @section('style')   
  <style>
    .package {
      background-color: aquamarine;
      border-radius: 25px;      
    }
    .card {
      border-radius: 25px !important; 
    }
  </style>
  @stop
  
  @section('content')
  <div class="container mt-3">
  <h2>Product List</h2>
  <div class="row">
  @forelse ($products as $product)  
    <div class="col-sm-3 col-md-6 col-lg-4 ">
      <div class="card" style="margin: 20px;">
       
        <div class="card-body package">
          <h4 class="card-title">{{ $product->name }}</h4>
          <h5 class="card-title">$ {{ $product->price }}</h5>
          <p class="card-text desc">{{ $product->description }}</p>
          <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary btn-block shadow rounded-pill">Buy Now</a>            
        </div>
      </div>
    </div>
  @empty
    <p>No Products</p>
  @endforelse  
  </div>         
               
  @endsection

