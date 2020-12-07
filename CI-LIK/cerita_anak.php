<?php
include("config.php");

if (isset($_POST['daftar'])) {
  registrasi($_POST);
}

$pageTitle = 'Cerita Anak';
include("header.php");
?>

<br><br><br>
<div class="container">
  <div class="row">
    <div class="col text-center">
      <h1><b>Cerita Anak</b></h1>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <div class="card">
        <img src="gbr/1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text"><b>AKU BERANI TIDUR SENDIRI</b></p>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <img src="gbr/2.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text"><b>LALA MEMBERSIHKAN SAMPAH</b></p>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <img src="gbr/3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text"><b>AYAM DAN KELINCI</b></p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('footer.php');
?>