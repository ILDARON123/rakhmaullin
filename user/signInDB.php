<?php
include("../header.php");

$_SESSION['result'] = "Не авторизован";

// перезаписываем данные с формы в таблицу для SQL запросов и сверки
$login = $_POST['login'];
$pass = $_POST['pass'];

if (!$login) :
    $_SESSION['result'] = "Ошибка, введите логин";
    header("location: signIn.php");
else :
    // Подключаем таблицу для сверки данных
    echo $query = "SELECT * FROM users WHERE phone='$login'";
    $res = $con->query($query);
    $check = mysqli_fetch_assoc($res);

    if (!$check) {
        // Ошибка, в случае если мы не смогли определить аккаунт
        $_SESSION['result'] = "Ошибка, не найден аккаунт с таким логином";
    } else {

        // Определяем, введён ли пароль и введён ли он верно
        if (!$pass) {
            $_SESSION['result'] = "Ошибка, введите пароль.";
            header("location: signIn.php");
        } elseif ($pass != $check['password']) {
            $_SESSION['result'] = "Ошибка, неверный пароль.";
        } elseif ($pass == $check['password']) {
            setcookie("user", $check['id_user'], time() + 3600 * 24, "/");
            $_SESSION['result'] = "Авторизация завершена. Добро пожаловать, " . $check['name'] . "!";
            // header("Location: /");
        }
    }
endif;
header("location: signIn.php")
?>

<div class="content">
    <p><?= $_SESSION['result'] ?></p>
    <p><?= $pass ?></p>
</div>