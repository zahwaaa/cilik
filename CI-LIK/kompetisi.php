<?php
include("config.php");

if (isset($_POST['daftar'])) {
  registrasi($_POST);
}

$pageTitle = 'Cerita Anak';
include("header.php");
?>

<div class="jumbotron bg-white">
  <div class="container">
    <center>
      <div class="col"></div>
      <div class="col-10">
        <div class="w-100 mb-5">
          <img src="gbr/write1.webp" style="width:300px;height:auto;">
          <h1 class="text-warning"><b>Kompetisi</b></h1>
          <div class="col-lg-12">
            <p class="ml-n3 mt-4 mb-4" style="font-size: 15px;">Kembangkan keterampilan menulis kamu dengan bergabung dalam kompetisi-kompetisi menarik di CILIK! Temukan bantuan di Dokumentasi atau pelajari tentang kompetisi pada deskripsi yang ada.</p>
          </div>
        </div>
      </div>
    </center>
  </div>
</div>
<!-- <div class="container cover-custom p-5">
  <div class="row">
    <div class="col">
      <h1 class="text-white"><b>Kompetisi</b></h1>
    </div>
  </div>

  <div class="col-lg-10">
    <p class="col-sm-10 ml-n4 mt-4 mb-4">Kembangkan keterampilan menulis kamu dengan bergabung dalam kompetisi-kompetisi menarik di CILIK! Temukan bantuan di Dokumentasi atau pelajari tentang kompetisi InClass.</p>
  </div>
</div> -->

<div class="container">
  <h4 class="mt-2 mb-4"><b>List Kompetisi</b></h4>
  <div>
    <div class="card mb-1 col-lg-10">
      <div class="row no-gutters">
        <div class="col-md-2">
          <img src="gbr/1.jpg" class="card-img">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Nama Kompetisi</h5>
            <p class="card-text">Deskripsi<br>Tanggal Mulai . Jumlah Kompetitor</p>
          </div>
        </div>
        <div class="col-md-2">
          <h5 class="mt-5">Hadiah</h5>
          <h5>Rp 1.000.000</h5>
        </div>
      </div>
    </div>

    <div class="card mb-1 col-lg-10">
      <div class="row no-gutters">
        <div class="col-md-2">
          <img src="gbr/2.jpg" class="card-img">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Nama Kompetisi</h5>
            <p class="card-text">Deskripsi<br>Tanggal Mulai . Jumlah Kompetitor</p>
          </div>
        </div>
        <div class="col-md-2">
          <h5 class="mt-5">Hadiah</h5>
          <h5>Rp 1.000.000</h5>
        </div>
      </div>
    </div>

    <div class="card mb-1 col-lg-10">
      <div class="row no-gutters">
        <div class="col-md-2">
          <img src="gbr/3.jpg" class="card-img">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Nama Kompetisi</h5>
            <p class="card-text">Deskripsi<br>Tanggal Mulai . Jumlah Kompetitor</p>
          </div>
        </div>
        <div class="col-md-2">
          <h5 class="mt-5">Hadiah</h5>
          <h5>Rp 1.000.000</h5>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>

<?php
include('footer.php');
?>