<?php



if (isset($_POST['girisyap']))
{
    //echo "Hello World !";
    include ('engine/config.php');

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $user_sanitize = filter_var($user, FILTER_SANITIZE_STRING);
    $pass_sanitize = filter_var($pass, FILTER_SANITIZE_STRING);
    $pass_enc =  md5($pass_sanitize);


    $sth = $conn->query("Select * from administrators where usn = '$user_sanitize' and pass ='$pass_enc' ");

    $count = $sth->rowcount();
    $row = $sth->fetch();

    if ($count > 0)
    {
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['id'] = true;
        header('location:home.php');
    }
    else
    {
        ?>
        <p class="text-light bg-red pl-1">Kullanıcı adınızı ve ya şifrenizi kontrol edin !</p>
        <?php
    }
}
?>
<!-- *********************************************** -->
<!--                                                 -->
<!--  ROYAL UI Powered By Foreach Devs UI Element    -->
<!--             by w0fly                            -->
<!-- *********************************************** -->

<!DOCTYPE html>
<html lang="tr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RoyalUI Admin Paneli</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="assets/images/logo.svg" alt="logo">
                        </div>
                        <h4>Merhaba ! Haydi giriş yap !</h4>
                        <h6 class="font-weight-light">Giriş yaparak işleminize devam edin.</h6>
                        <form class="pt-3" action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="user" placeholder="Kullanıcı Adı">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="pass" placeholder="Şifre">
                            </div>
                            <div class="mt-3">
                                <input name="girisyap" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="Giriş Yap"></input>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        Beni Hatırla
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black">Şifreni mi unuttun ?</a>
                            </div>
                            <!--div class="mb-2">
                                <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                    <i class="ti-facebook mr-2"></i>Connect using facebook
                                </button>
                            </div-->
                            <!--div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="register.html" class="text-primary">Create</a>
                            </div-->
                        </form>
                    </div>
                </div>

            </d       </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
</body>

</html>

