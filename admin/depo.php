<?php
include '../components/connect.php';
/* echo '<pre>';
var_dump($_POST);
echo '</pre>'; */
if (isset($_GET['depo_insert'])) {

    $product_name = $_POST["product_name"];
    $quantity = $_POST["quantity"];
    $critical_quantity = $_POST["critical_quantity"];
    $unit = $_POST["unit"];

    $add_product = $conn->prepare("INSERT INTO `depo`(product_name, quantity,unit, critical_quantity) VALUES(?,?,?,?)");
    $sonuc = $add_product->execute([$product_name, $quantity, $unit, $critical_quantity]);
    if ($sonuc) {
        $success_msg[] = 'Ürün Eklendi.';
    }
}

if (isset($_GET["sildepo"])) {
    $delete_query = "DELETE FROM depo WHERE `depo`.`id` = ?";
    $query_delete = $conn->prepare($delete_query);
    $query_delete->execute([$_GET["sildepo"]]);
    header("Location:depo.php");
}

?>


<!DOCTYPE html>
<html lang="tr">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ürün Tanımlama</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include '../components/header.php'; ?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-4">
                <div id="login">
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="supply_company" class="col-md-12 title">
                                    <form id="login-form" action="depo_insert.php" method="POST">
                                        <div class="form-group">
                                            <label for="product_id" class="text-success">Ürün No:</label><br>
                                            <input type="text" name="product_id" id="product_id" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name" class="text-success">Ürün Adı:</label><br>
                                            <input type="text" name="product_name" id="product_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity" class="text-success">Ürün Miktarı:</label><br>
                                            <input type="text" name="quantity" id="quantity" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="unit" class="text-success">Ürün Türü:</label><br>
                                            <select class="form-control" id="mySelect2">
                                                <option value="1">KĞ</option>
                                                <option value="2">ADET</option>
                                                <option value="3">PAKET</option>
                                                <option value="3">ÇUVAL</option>
                                                <option value="3">LİTRE</option>
                                                <option value="3">TENEKE</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="critical_quantity" class="text-success">Kritik Miktar:</label><br>
                                            <input type="text" name="critical_quantity" id="critical_quantity" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="depo_insert" class="btn btn-success btn-lg  mt-4" value="Ürün Kaydet">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-8">
                <div class="container">
                    <?php
                    $select_all_depo = $conn->prepare("SELECT * FROM `depo`");
                    $select_all_depo->execute();
                    while ($fetch_order = $select_all_depo->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="col-12">
                            <div class="row line">
                                <div class="title col text-center"><?= $fetch_order['id']; ?></div>
                                <div class="title col text-center"><?= $fetch_order['product_name']; ?></div>
                                <div class="title col text-center"><?= $fetch_order['unit']; ?></div>
                                <div class="title col text-center"><?= $fetch_order['quantity']; ?></div>
                                <div class="title col text-center"><?= $fetch_order['critical_quantity']; ?></div>

                                <div class="col d-flex justify-content-center">
                                    <a href="supply_company_update.php?duzenledepo=<?= $fetch_order['id']; ?>" class="btn btn-primary mx-1" name="duzenle">Düzenle</a>
                                    <a href="?sildepo=<?= $fetch_order['id']; ?>" class="btn btn-danger " name="sil" onclick="return confirm('Silinsin mi')">Sil</a>
                                </div>

                            </div>

                        </div>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="../js/script.js"></script>


    <?php include '../components/alert.php'; ?>
</body>

</html>