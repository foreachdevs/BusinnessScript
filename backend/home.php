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
    $tablocek=$sql-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
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
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="font-weight-bold mb-0">Foreach Devs | Managment Console</h4>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Online Sayısı</p>
                                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                        <?php
                                        $visitors = $conn->prepare("SELECT COUNT(*) FROM online");
                                        $visitors->execute();
                                        $visitorcek = $visitors->fetchColumn();
                                        echo  $visitorcek;
                                        ?>
                                    </h3>
                                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Alınan Bağışlar</p>
                                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                        <?php
                                        $donates = $conn->prepare("SELECT COUNT(*) FROM bagislar");
                                        $donates->execute();
                                        $donatecek = $donates->fetchColumn();
                                        echo  $donatecek;
                                        ?>
                                    </h3>
                                    <i class="ti-credit-card icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">İletişim Formları</p>
                                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                        <?php
                                        $iletisim = $conn->prepare("SELECT COUNT(*) FROM iletisim");
                                        $iletisim->execute();
                                        $iletsay = $iletisim->fetchColumn();
                                        echo  $iletsay;
                                        ?>
                                    </h3>
                                    <i class="ti-comment-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Yönetici Sayısı</p>
                                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php
                                        $admins = $conn->prepare("SELECT COUNT(*) FROM administrators");
                                        $admins->execute();
                                        $adminsay = $admins->fetchColumn();
                                        echo  $iletsay;
                                        ?></h3>
                                    <i class="ti-headphone-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title mb-0">İletişim Bilirimleri</p>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Ad Soyad</th>
                                            <th>E-Posta</th>
                                            <th>Başlık</th>
                                            <th>Konu</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($tablocek as $cek){?>
                                            <tr>


                                            <td><?= $cek->adsoyad ?></td>
                                            <td><?= $cek->mail ?></td>
                                            <td><?= $cek->baslik ?></td>
                                            <td><?= $cek->konu ?></td>

                                            </tr>

                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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


