<?php

include 'components/connect.php';

if (empty($_POST["username"]) || empty($_POST["password"])) {
    die("Kullanıcı adı veya Şifre boş");
} else {
    $username = $_POST["username"];
    $company_official = $_POST["company_official"];
    $company = $_POST["company"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $passwordd = $_POST["password"];
    $telephone = $_POST["telephone"];

    $set_user = $conn->prepare("INSERT INTO `users`(username,company_official,company,address,email,passwordd,telephone) 
    VALUES (?,?,?,?,?,?,?);
    ");
    $set_user->execute([$username, $company_official, $company, $address, $email, $passwordd, $telephone]);

    /*     INSERT INTO `users`(`user_id`, `username`, `company_official`, `company`, `address`, `email`, `passwordd`, `telephone`, `tray_count`, `wedge_count`, `dept`) 
    VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]') */

    if ($set_user) {
        header('location:sign_up.php');
    } else {
        die("Hatalı Kullanıcı Adı veya Şifre");
    }
}
