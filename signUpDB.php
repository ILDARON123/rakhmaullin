<?php
include('header.php');

$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = ($_POST['patronymic']) ? "'" . $_POST['patronymic'] . "'" : "NULL";
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$password = ($_POST['password'] == $_POST['password-repeat']) ? $_POST['password'] : false;
$birthday = date($_POST['birthday']);

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
    $_SESSION['result'] = "Пароли не совпадают";
} else {

    if (!isset($_FILES)) {
        $photo_name = $_FILES['photo']['name'];
        $moveTo = "./img/users/" . $photo_name;
        move_uploaded_file($_FILES['photo']['tmp_name'], $moveTo);
    } else {
        $photo_name = "default.png";
    }

    $created_at = date("Y-m-d H:m:s");
    $query =
        "INSERT INTO `users` 
    (`id_user`, `surname`, `name`, `patronymic`, `phone`, `password`, `birthday`, `photo`, `gender`, `created_at`, `awards`, `role`) 
    VALUES 
    (NULL, '$surname', '$name', $patronymic, '$phone', '$password', '$birthday', '$photo_name', '$gender', '$created_at', NULL, '2');";
    echo ($query);
    $newUser = $connect->query($query);
    $_SESSION['result'] = "Регистрация прошла успешно";
}
echo ($_SESSION['result']) . "<br>";
exit();
// header('Location: regUser.php');
