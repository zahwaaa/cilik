@extends('template.master')

@section('content')
<div class="jumbotron bg-white">
    <div class="container text-center">
      {{-- <center> --}}
        <div class="col"></div>
        <div class="col-12">
          <div class="w-100 mb-5">
            <img src="{{ asset('template') }}/gbr/write1.webp" style="width:300px;height:auto;">
            <h1 class="text-warning"><b>Kompetisi</b></h1>
            <div class="col-lg-12">
              <p class="ml-n3 mt-4 mb-4" style="font-size: 15px;">Kembangkan keterampilan menulis kamu dengan bergabung dalam kompetisi-kompetisi menarik di CILIK! Temukan bantuan di Dokumentasi atau pelajari tentang kompetisi pada deskripsi yang ada.</p>
            </div>
          </div>
        </div>
      {{-- </center> --}}
    </div>
</div>

<div class="container">
    <h4 class="mt-2 mb-4"><b>List Kompetisi</b></h4>
    <div>

      @foreach($comps as $product)
      <div class="card mb-1 col-lg-10" onclick="location.href='{{ route('homepage.competition', $product->id)}}'" style="cursor: pointer;">
        <div class="row no-gutters">
          <div class="col-md-2">
            <img src="{{ asset('storage/'.$product->thumbnail) }}" class="card-img">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">{!! $product->description !!}<br>{{ $product->start_date->format('d F Y') }} . Jumlah Kompetitor : {{ $product->users()->count() }}</p>
            </div>
          </div>
          <div class="col-md-2">
            <h5 class="mt-5">Hadiah</h5>
            <h5>Rp. {{ number_format($product->hadiah, 0, ',', '.') }}</h5>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <br>
  </div>
@endsection
