<?php
$array  = $_SESSION['id'];
$query  = $conn -> prepare("SELECT * FROM administrators WHERE id = :id");
$query -> execute(['id' => $array]);
$row    = $query -> fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['kaydet'])) {
    $user = trim(filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING));
    $pwd = trim(filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING));
    $avatar = trim(filter_input(INPUT_POST, 'avatar', FILTER_SANITIZE_STRING));
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    $pass_enc =  md5($pwd);

    try {
        $sorgu = $conn->prepare("UPDATE administrators SET usn = ?, email = ?, pass = ?, imgpath = ?  WHERE id = ?");
        $sorgu->bindParam(1, $user, PDO::PARAM_STR);
        $sorgu->bindParam(2, $mail, PDO::PARAM_STR);
        $sorgu->bindParam(3, $pass_enc, PDO::PARAM_STR);
        $sorgu->bindParam(4, $avatar, PDO::PARAM_STR);
        $sorgu->bindParam(5, $_SESSION['id'], PDO::PARAM_INT);
        $sorgu->execute();
        if ($sorgu->rowCount() > 0) {
            echo $sorgu->rowCount() . " kayıt güncellendi.";
        } else {
            echo "Herhangi bir kayıt güncellenemedi.";
        }

    } catch (PDOException $e) {
        die($e->getMessage());
    }



}

?>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Kullanıcı Ayarları</h4>
            <p class="card-description">
                Ayarlarınızı Düzenleyin
            </p>
            <form class="forms-sample" action="" method="post">
                <div class="form-group">
                    <label for="exampleInputName1">Kullanıcı Adı</label>
                    <input value="<?php foreach ($row as $item) {
                        echo ($item["usn"]);
                    } ?>" type="text" name="user" class="form-control" id="exampleInputName1" placeholder="Kullanıcı Adı">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">E-Posta Adresi</label>
                    <input value="<?php foreach ($row as $item) {
                        echo ($item["email"]);
                    } ?>" type="email" name="mail" class="form-control" id="exampleInputEmail3" placeholder="E-Posta">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Şifre</label>
                    <input value="<?php foreach ($row as $item) {
                        echo ($item["pass"]);
                    } ?>" type="password" name="pwd" class="form-control" id="exampleInputPassword4" placeholder="Şifre">
                </div>

                <div class="form-group">
                    <label for="exampleInputCity1">Avatar URL</label>
                    <input value="<?php foreach ($row as $item) {
                        echo ($item["imgpath"]);
                    } ?>" type="text" name="avatar" class="form-control" id="exampleInputCity1" placeholder="Avatar URL">
                </div>

                <button type="submit" name="kaydet" class="btn btn-primary mr-2">Kaydet</button>
            </form>
        </div>
    </div>
</div>