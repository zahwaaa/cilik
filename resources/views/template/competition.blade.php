@extends('template.master')

@section('content')
<div class="container">
    <h6 class="text-primary"><b>Kompetisi</b></h6>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h1 class="mt-2 mb-4"><b>{{ $title }}</b></h1>
    <p class="card-text">Sponsor : {{ $competition->sponsor }}<br>Periode : {{ $competition->start_date->format('d F Y') }} - {{ $competition->end_date->format('d F Y') }}<br>Hadiah : Rp.{{ number_format($competition->hadiah, 0, ',', '.') }}</p>
    <img src="{{ asset('storage/'. $competition->thumbnail) }}" width="700" height="auto"><br><br><br>
    <pre class="col-9 ml-n2" style="font-family: 'Ubuntu', sans-serif!important; font-size: 18px;">
        <h2>Deskripsi</h2>
        {!! $competition->description !!}

        <h2>Ketentuan</h2>
        {!! $competition->ketentuan !!}

        <h2>Peraturan</h2>
        {!! $competition->rules !!}

        <h2>Timeline</h2>
        {!! $competition->timeline !!}

    </pre>
    <h2>Daftar Kompetisi</h2>
    <form action="{{ route('homepage.competition_store', $competition->id) }}" method="post">@csrf
        <button class="btn btn-primary" type="submit">
            Daftar
            @if($competition->is_paid == 1)
            <sup><span class="text-danger"><small>*</small></span></sup>
            @endif
        </button>
    </form>
    <br>
</div>
@endsection
