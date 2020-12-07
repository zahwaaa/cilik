<?php
include("config.php");

if (isset($_POST['daftar'])) {
    registrasi($_POST);
}

$pageTitle = 'Register';
include("header_before_login.php");
?>

<!-- NOTIF -->
<?php
if (isset($_SESSION['message'])) : ?>
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

<div class="container d-flex justify-content-center ">
    <div class="card w-50 shadow mb-5  rounded">

        <div class="card-header bg-white ml-5 mr-5" style="text-align: center;">
            <h3 class="card-title mt-4" style="text-align: center;">Registrasi</h3>
        </div>
        <div class="card-body ml-5 mr-5 ">

            <!--Form-->
            <form action="" method="POST">
                <div class="form-group">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat E-mail" required>
                </div>
                <div class="form-group">
                    <label for="inputAddress">No. Handphone</label>
                    <input type="text" class="form-control" id="hp" name="nohp" placeholder="Masukkan Nomor Handphone">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kata Sandi</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Buat Kata Sandi">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Konfirmasi Kata Sandi</label>
                    <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Konfirmasi Kata Sandi">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn justify-content-center btn-primary" name="daftar">Daftar</button>
                </div>
                <p class="text-center">Sudah punya akun? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>
</div>
</div>


<?php
include('footer.php');
?>