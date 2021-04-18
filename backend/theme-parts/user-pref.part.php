<ul class="navbar-nav navbar-nav-right">
    <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="
                        <?php
            $sorgu = $conn->prepare("SELECT imgpath FROM administrators WHERE id = ?");
            $sorgu->bindParam(1, $kimlik, PDO::PARAM_INT);
            $sorgu->execute();
            $cikti = $sorgu->fetch(PDO::FETCH_ASSOC);
            echo $cikti['imgpath'];?>
                        " alt="profile"/>
            <?php echo $kimlik;?>

        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="settings.php">
                <i class="ti-settings text-primary"></i>
                Ayarlar
            </a>
            <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Çıkış Yap
            </a>
        </div>
    </li>
</ul>