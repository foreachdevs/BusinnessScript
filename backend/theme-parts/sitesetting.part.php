<?php
$array  = 1;
$query  = $conn -> prepare("SELECT * FROM site WHERE id = :id");
$query -> execute(['id' => $array]);
$row    = $query -> fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['kaydet'])) {
    $salter = trim(filter_input(INPUT_POST, 'salter', FILTER_SANITIZE_STRING));
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $keywd = trim(filter_input(INPUT_POST, 'keywd', FILTER_SANITIZE_STRING));
    $aciklama = trim(filter_input(INPUT_POST, 'aciklama', FILTER_SANITIZE_STRING));
    $tema = trim(filter_input(INPUT_POST, 'tema', FILTER_SANITIZE_STRING));
    $apiusn = trim(filter_input(INPUT_POST, 'apiusn', FILTER_SANITIZE_STRING));
    $apipass = trim(filter_input(INPUT_POST, 'apipass', FILTER_SANITIZE_STRING));

    try {
        $sorgu = $conn->prepare("UPDATE site SET title = ?, keywd = ?, aciklama = ?, shopier_api_user = ?, shopier_api_pass = ?   WHERE id = 1");
        $sorgu->bindParam(1, $title, PDO::PARAM_STR);
        $sorgu->bindParam(2, $keywd, PDO::PARAM_STR);
        $sorgu->bindParam(3, $aciklama, PDO::PARAM_STR);
        $sorgu->bindParam(4, $apiusn, PDO::PARAM_STR);
        $sorgu->bindParam(5, $apipass, PDO::PARAM_STR);

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
            <h4 class="card-title">Site Ayarları</h4>
            <p class="card-description">
                Site ayarlarını bu menüden özelleştirebilirsiniz.
            </p>
            <form class="forms-sample" action="" method="post">
                <div class="form-group">
                    <label for="exampleInputName1">Site Title</label>
                    <input name="title" value="<?php foreach ($row as $item) {
                        echo ($item["title"]);
                    } ?>" type="text" class="form-control" id="exampleInputName1" placeholder="Site Title">
                </div>



                <div class="form-group">
                    <label for="exampleInputCity1">Anahtar Kelimeler</label>
                    <input name="keywd" value="<?php foreach ($row as $item) {
                        echo ($item["keywd"]);
                    } ?>" type="text" class="form-control" id="exampleInputCity1" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">Shopier API Kullanıcı</label>
                    <input name="apiusn" value="<?php foreach ($row as $item) {
                        echo ($item["shopier_api_user"]);
                    } ?>" type="text" class="form-control" id="exampleInputCity1" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">Shopier API Şifre</label>
                    <input name="apipass" value="<?php foreach ($row as $item) {
                        echo ($item["shopier_api_pass"]);
                    } ?>" type="text" class="form-control" id="exampleInputCity1" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Meta Açıklama</label>
                                <?php foreach ($row as $item) {
                                    echo  '<textarea name="aciklama"  class="form-control" id="exampleTextarea1" cols="40" rows="5">'.$item["aciklama"].'</textarea>';

                                } ?>
                </div>
                <button type="submit" name="kaydet" class="btn btn-primary mr-2">Kaydet</button>
            </form>
        </div>
    </div>
</div>