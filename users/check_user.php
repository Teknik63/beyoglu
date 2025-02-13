<?php

include 'components/connect.php';

if (empty($_POST["username"]) || empty($_POST["password"])) {
    die("Kullanıcı adı veya Şifre boş");
} else {
    $get_users = $conn->prepare("SELECT * FROM `users` WHERE username = ? AND passwordd = ? LIMIT 1");
    $get_users->execute([$_POST['username'], $_POST["password"]]);
    if ($get_users->rowCount() > 0) {
        while ($fetch_order = $get_users->fetch(PDO::FETCH_ASSOC)) {
            $user_name = $fetch_order['username'];
            setcookie('user_name', $user_name);
            header('location:orders.php');
        }
    } else {
        die("Hatalı Kullanıcı Adı veya Şifre");
    }
}
