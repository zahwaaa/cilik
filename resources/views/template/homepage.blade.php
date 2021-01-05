@extends('template.master')

@section('content')
<div class=container>
    <div class="row">
    </div>
    <br><br>
    <div class="row">
        <div class="col">
            <h1>Website Cilik</h1>
            <br>
            <p>Website CILIK mulai beroperasi (online) pada akhir 2020, dengan tujuan untuk memberikan dorongan serta semangat kepada anak-anak agar berani berkarya, sehingga tercipta suatu sarana yang bermanfaat untuknya.
            </p>
        </div>
        <div class="col">
            <img src="{{ asset('template') }}/gbr/about.jpg" />
            <!-- <img src="karya.jpg" width="400" class="rounded-circle"> -->
        </div>

    </div>

</div>
<div class="jumbotron jumbotron-fluid">
    <img src="./background/ayo.JPG" />
    <div class="container text-center">
        <h2 class="display-6"><b>Tips Ampuh Jadi Penulis</b></h2>
        <p class="lead">Berikut ini 4 tips sederhana yang harus kamu lakukan agar jadi penulis, yaitu: </p>
    </div>
</div>
@endsection
