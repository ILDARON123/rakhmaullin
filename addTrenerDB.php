<?php
include "header.php";

$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = ($_POST['patronymic'] == false) ? "NULL" : "'" . $_POST['patronymic'] . "'";
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$birthday = date($_POST['birthday']);
$awards = ($_POST['awards'] == false) ? "NULL" : "'" . $_POST['awards'] . "'";

if (!$surname) {
    $_SESSION['result'] = "Введите фамилию";
} elseif (!$name) {
    $_SESSION['result'] = "Введите имя";
} elseif (!$phone) {
    $_SESSION['result'] = "Введите телефонный номер";
} elseif (!$gender) {
    $_SESSION['result'] = "Выберите пол";
} elseif (!$birthday) {
    $_SESSION['result'] = "Введите дату рождения";
} elseif (!$password) {
    $_SESSION['result'] = "Введите пароль";
} else {
    $photo_name = $_FILES['photo']['name'];
    $moveTo = '../img/users/' . $photo_name;
    move_uploaded_file($_FILES['photo']['tmp_name'], $moveTo);

    $created_at = date("Y-m-d H:i:s");

    $q_trener_push =
        "INSERT INTO `users` 
        (`id_user`, `surname`, `name`, `patronymic`, `phone`, `password`, `birthday`, `photo`, `gender`, `created_at`, `awards`, `role`) 
        VALUES 
        (NULL, '$surname', '$name', $patronymic, '$phone', '$password', '$birthday', '$photo_name', '$gender', '$created_at', $awards, '3');";
    print_r($q_trener_push);
    $trener_push = $con->query($q_trener_push);
    echo "<br><br>" . $birthday . "<br><br>" . $password . "<br><br>" . $photo_name . "<br><br>";
    var_dump($trener_push);
    $_SESSION['result'] = 'Список тренеров обновлён';
}
header("location: addTrener.php");
