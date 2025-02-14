<?php
include '../components/connect.php';
/* echo '<pre>';
var_dump($_POST);
echo '</pre>'; */
if (isset($_POST['depo_insert'])) {

    $product_name = $_POST["product_name"];
    $quantity = $_POST["quantity"];
    $critical_quantity = $_POST["critical_quantity"];

    $add_product = $conn->prepare("INSERT INTO `depo`(product_name, quantity, critical_quantity) VALUES(?,?,?)");
    $sonuc = $add_product->execute([$product_name, $quantity, $critical_quantity]);
    if ($sonuc) {
        $success_msg[] = 'Ürün Eklendi.';
    }
}

if (isset($_GET["Sil"])) {
    $delete_query = "DELETE FROM supply_company WHERE `supply_company`.`id` = ?";
    $query_delete = $conn->prepare($delete_query);
    $query_delete->execute([$_GET["Sil"]]);
    header("Location:supply_company_check.php");
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
                                <label for="email" class="text-success">E-mail:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="critical_quantity" class="text-success">Kritik Miktar:</label><br>
                                <input type="text" name="critical_quantity" id="critical_quantity" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="add" class="btn btn-success btn-lg  mt-4" value="Ürün Kaydet">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="../js/script.js"></script>


    <?php include '../components/alert.php'; ?>
</body>

</html>