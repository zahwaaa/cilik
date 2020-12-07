<?php
    include ("config.php");
    
    if (isset($_POST['loginn'])) {
        login($_POST);
    }

    if (!empty($_COOKIE['remember'])) {
        $email = $_COOKIE['email'];
        $password = $_COOKIE['password'];
        $remember = $_COOKIE['remember'];
    } else {
        $email = null;
        $password = null;
        $remember = null;
    }

    
$pageTitle = 'Login';
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

<div class="container d-flex justify-content-center ">
    <div class="card w-50 shadow mb-5 bg-white rounded">
    
        <div class="card-header bg-white ml-5 mr-5" style="text-align: center;">
        <h3 class="card-title mt-4" style="text-align: center;">Login</h3>
            </div>
    <div class="card-body ml-5 mr-5 ">

    <!--Form-->
    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="email" class="form-control" id="email" name="emaill" aria-describedby="emailHelp" placeholder="Masukkan Alamat E-mail" value="<?= $email; ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Kata Sandi</label>
            <input type="password" id="pass" name="pass" class="form-control" placeholder="" value="<?= $password; ?>">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" id="remember" name="remember" class="form-check-input" id="exampleCheck1" <?= $remember; ?>>
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        
        <div class="text-center">
        <button type="submit" class="btn justify-content-center btn-primary" name="loginn">Login</button>
        </div>
        <p class="text-center">Belum punya akun? <a href="register.php">Registrasi</a></p>
    </form>
    </div>
    </div>
    </div>
</div>

<?php
    include ("footer.php");
?>