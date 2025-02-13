<?php
include '../components/connect.php';
/* echo '<pre>';
var_dump($_POST);
echo '</pre>'; */
if (isset($_POST['add'])) {

    $company_name = $_POST["company_name"];
    $company_official = $_POST["company_official"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];

    $add_company = $conn->prepare("INSERT INTO `supply_company`(company_name, company_official, email, telephone) VALUES(?,?,?,?)");
    $sonuc = $add_company->execute([$company_name, $company_official, $email, $telephone]);
    if ($sonuc) {
        $success_msg[] = 'Firma Eklendi.';
    }
}

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/stil.css">
</head>

<body>
    <div class="container">

        <?php
        $select_all_company = $conn->prepare("SELECT * FROM `supply_company`");
        $select_all_company->execute();
        while ($fetch_order = $select_all_company->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="col-12">
                <div class="row">
                    <div class="title col"><?= $fetch_order['company_name']; ?></div>
                    <div class="title col"><?= $fetch_order['company_official']; ?></div>
                    <div class="title col"><?= $fetch_order['email']; ?></div>
                    <div class="title col"><?= $fetch_order['telephone']; ?></div>
                </div>

            </div>

        <?php
        }
        ?>

    </div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="../js/script.js"></script>
    <?php include '../components/alert.php'; ?>
</body>

</html>