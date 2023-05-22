<?php

// Подключение БД и сессии
include('../header.php');
$_SESSION['result'] = "Регистрация прошла успешно";

// Запись в переменные для последующего SQL-запроса
$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'] ? "'" . $_POST['patronymic'] . "'" : "NULL";
// $login = $_POST['login'];
// $email = $_POST['email'];
$gender = $_POST['gender'];
$phone = $_POST['phone'] ? $_POST['phone'] : false;
$birthday = date($_POST['birthday']);
$pass = ($_POST['pass'] == $_POST['passRep']) ? $_POST['pass'] : false;

// Время создания
$created_at = date("Y-m-d H:m:s");


// Защита от дурака, отключившего JS
if (!$_FILES) {
    $_SESSION['result'] = "Добавьте фото";
} elseif (!$surname) {
    $_SESSION['result'] = "Введите фамилию (только кириллица)";
} elseif (!$name) {
    $_SESSION['result'] = "Введите имя (только кириллица)";
} /* elseif (!$email) {
    $_SESSION['result'] = "Введите почту";
} */ elseif (!$pass) {
    $_SESSION['result'] = "Пароли не совпадают";
} elseif ($phone) {
    // Проверка логина, почты и телефона на уникальность
    $res = $con->query("SELECT * FROM users");
    $check = mysqli_fetch_assoc($res);

    // Проверка длинны логина, пароля 
    if (strlen($phone) != 11) {
        $_SESSION['result'] = "Некорректный телефон 11 цифр";
    } elseif (strlen($pass) < 6 && strlen($pass) > 32) {
        $_SESSION['result'] = "Некорректный пароль (от 6 до 32 символов)";
    } elseif ($check['phone'] == substr($phone, 1, 11) && $phone != "NULL") {
        $_SESSION['result'] = "Телефон уже используется";
    } else {
        // Работа с файлами
        $photo_name = $_FILES['photo']['name'];
        $moveTo = 'img/treners/' . $photo_name;
        move_uploaded_file($_FILES['photo']['tmp_name'], $moveTo);

        // Добавление пользователя. 
        $query =
            "INSERT INTO `users` 
                (`id_user`, `surname`, `name`, `patronymic`, `phone`, `password`, `birthday`, `photo`, `gender`, `created_at`, `awards`, `role`) 
                VALUES 
                (NULL, '$surname', '$name', $patronymic, '$phone', '$pass', '$birthday', '$photo_name', '$gender', '$created_at', NULL, '2');";

        echo $query . "<br>";
        $res = $con->query(($query));

        // Автоматический вход в аккаунт после регистрации
        $query = "SELECT * FROM `users` WHERE `phone`='$phone' AND `password`='$pass';";
        echo $query;
        $res = $con->query($query);
        $user = mysqli_fetch_assoc($res);

        setcookie("user", $account['id_user'], time() + 3600 * 24, "/");

        $_SESSION['result'] = "Регистрация завершена. Добро пожаловать, " . $user['name'] . "!";
        header("Location: ../index.php");
    }
}
// header("location: signUp.php");
?>

<div class="content">
    <p><?= $_SESSION['result'] ?></p>
    <p><?= $query ?></p>
    <p><?= strlen($phone) ?></p>
</div>