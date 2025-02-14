<?php
include '../components/connect.php';

if (isset($_GET["duzenle"])) {
    $id = $_GET["duzenle"];
    print($id);
    $sql = "SELECT * FROM `supply_company` WHERE id = ?";
    $sorgu = $conn->prepare($sql);
    $sorgu->execute([$id]);
    $kayit = $sorgu->fetch(PDO::FETCH_ASSOC);
}


if (isset($_POST["duzenle"])) {
    $sql = "UPDATE `supply_company` SET 
`company_name` = ?, 
`company_official` = ?, 
`email` = ?, 
`telephone` = ?
WHERE id = ?";

    $dizi = [$_POST["company_name"], $_POST["company_official"], $_POST["email"], $_POST["telephone"], $kayit["id"]];
    $sorgu = $conn->prepare($sql);
    $sorgu->execute($dizi);
    header("Location:supply_company_check.php");
}

?>


<!DOCTYPE html>
<html lang="tr">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Firma Güncelleme</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include '../components/header.php';   ?>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="supply_company" class="col-md-12">
                        <form id="login-form" action="" method="POST">
                            <div class="form-group">
                                <label for="company_name" class="text-success">Firma Adı:</label><br>
                                <input type="text" name="company_name" id="company_name" class="form-control" value="<?= $kayit["company_name"]  ?>">
                            </div>
                            <div class="form-group">
                                <label for="company_official" class="text-success">Firma Yetklisi:</label><br>
                                <input type="text" name="company_official" id="company_official" class="form-control" value="<?= $kayit["company_official"]  ?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-success">E-mail:</label><br>
                                <input type="email" name="email" id="email" class="form-control" value="<?= $kayit["email"]  ?>">
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="text-success">Telefon:</label><br>
                                <input type="text" name="telephone" id="telephone" class="form-control" value="<?= $kayit["telephone"]  ?>">
                            </div>
                            <div class="form-group justify_content-between">
                                <input type="submit" name="duzenle" class="btn btn-success btn-md mt-4" value="Firma Güncelle">
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