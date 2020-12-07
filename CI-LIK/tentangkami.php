<?php
include("config.php");

if (isset($_POST['daftar'])) {
    registrasi($_POST);
}

$pageTitle = 'Tentang Kami';
include("header.php");
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

<?php
include('footer.php');
?>