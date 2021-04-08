<?php
ob_start();
session_start();
include "engine/config.php";
if (isset($_SESSION['id']))
{
    //echo "Pass Dogru !";
    $kimlik = $_SESSION['id'];
    $sql = $conn->prepare("SELECT * FROM iletisim");
    $sql->execute();
    $tablocek=$sql-> fetchAll(PDO::FETCH_OBJ);

    if (isset($_POST['blogbas'], $_POST['onresim'], $_POST['slug'], $_POST['tarih'], $_POST['icerik'])) {

        $baslik = trim(filter_input(INPUT_POST, 'blogbas', FILTER_SANITIZE_STRING));
        $onresim = trim(filter_input(INPUT_POST, 'onresim', FILTER_SANITIZE_STRING));
        $slug = trim(filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_EMAIL));
        $tarih = trim(filter_input(INPUT_POST, 'tarih', FILTER_SANITIZE_STRING));
        $icerik = trim(filter_input(INPUT_POST, 'icerik', FILTER_SANITIZE_STRING));

        if (empty($baslik) || empty($onresim) || empty($slug) || empty($tarih) || empty($icerik)) {
            die("<p>Lütfen formu eksiksiz doldurun!</p>");
        }



        try {

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sorgu = $conn->prepare("INSERT INTO blog(baslik, resim, slug, icerik, tarih) VALUES(?, ?, ?, ?, ?)");
            $sorgu->bindParam(1, $baslik, PDO::PARAM_STR);
            $sorgu->bindParam(2, $onresim, PDO::PARAM_STR);
            $sorgu->bindParam(3, $slug, PDO::PARAM_STR);
            $sorgu->bindParam(4, $icerik, PDO::PARAM_STR);
            $sorgu->bindParam(5, $tarih, PDO::PARAM_STR);

            $sorgu->execute();

            ?>
            <div class="col-md-12"><label class="badge badge-success">Ekleme işlemi başarılı !</label></div>
            <?php

        } catch (PDOException $e) {
            die($e->getMessage());
        }


    }


}
else
{
    echo "403 !";
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RoyalUI Admin</title>
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
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="#"><img src="assets/images/logo.svg" class="mr-2" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="#"><img src="assets/images/logo-mini.svg" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="ti-view-list"></span>
            </button>
            <?php include "theme-parts/user-pref.part.php"; ?>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="ti-view-list"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include "theme-parts/navbar.part.php"; ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <form action="" method="post">
                <?php include "theme-parts/blog-head.part.php";?>
                <?php include "theme-parts/blog.part.php";?>
                <br>
                <div class="col-12 grid-margin stretch-card">

                    <button type="submit" class="btn btn-primary mr-2">Yazıyı Ekle</button>


                </div>
                </form>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php include "theme-parts/footer.part.php";?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="assets/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="assets/js/dashboard.js"></script>
<!-- End custom js for this page-->
</body>

</html>


