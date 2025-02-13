<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeyOğlu Baklavaları</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stil.css">

</head>

<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="new_user" class="col-md-12">
                        <form id="login-form" class="form" action="new_check_user.php" method="post">
                            <div class="form-group">
                                <label for="username" class="text-success">Kullanıcı Adı:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company_official" class="text-success">Firma Yetkilisi:</label><br>
                                <input type="text" name="company_official" id="company_official" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company" class="text-success">Firma Adı:</label><br>
                                <input type="text" name="company" id="company" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address" class="text-success">Adres:</label><br>
                                <input type="text" name="address" id="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-success">E-mail:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-success">Şifre:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="text-success">Telefon:</label><br>
                                <input type="text" name="telephone" id="telephone" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-success btn-md mt-4" value="Kaydet">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>