@extends('template.master')

@section('content')
<div class="container">
    <div class="row">
      <div class="col text-center">
        <h1><b>{{ $title }}</b></h1>
      </div>
    </div>
    <br>
    <div class="row">
      @foreach($products as $product)
      <div class="col-md-4" onclick="location.href='{{ route('homepage.article', $product->slug)}}'" style="cursor: pointer;">
        <div class="card">
          <img src="{{ asset('storage/'.$product->thumbnail) }}" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text"><b>{{ strtoupper($product->title) }}</b></p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
@endsection
