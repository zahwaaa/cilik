<?php
include("config.php");

if (isset($_POST['daftar'])) {
    registrasi($_POST);
}

$pageTitle = 'Home';
include("header_before_login.php");
?>


<!-- NOTIF -->
<?php if (isset($_SESSION['message'])) : ?>
    <div class='alert alert-warning alert-dismissible fade show fade in' role='alert'>
        <?= $_SESSION['message']; ?>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>
<?php
    unset($_SESSION['message']);
endif;
?>
<br>

<!-- Card -->

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
            <img src="./background/ayo.JPG" />
            <img src="karya.jpg" width="400" class="rounded-circle">
        </div>

    </div>

</div>
<div class="jumbotron jumbotron-fluid">
    <img src="./background/ayo.JPG" />
    <div class="container text-center">
        <h4 class="display-4"><b>Tips Ampuh Jadi Penulis</b></h4>
        <p class="lead">Berikut ini 4 tips sederhana yang harus kamu lakukan agar jadi penulis, yaitu: </p>
    </div>
</div>

<?php
include("footer.php");
?>