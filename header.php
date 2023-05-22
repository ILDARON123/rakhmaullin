<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<?php
$con = mysqli_connect('localhost', 'root', '', 'fitness_rakhmatullin');
session_start();

if (isset($_COOKIE['user'])) {
    $user = $_COOKIE['user'];
    $query = "SELECT * FROM users WHERE `id_user`='$user'";
    $res = $con->query($query);
    $account = mysqli_fetch_assoc($res);
}
?>

<body>

    <header>
        <div class="logo">
            <img src="" alt="">
            <h1>Заголовок</h1>
            <?php
            if (isset($account)) {
            ?>
                <h2><?= $account['name'] ?>. <img style="height: 50px" src="../img/users/<?= $account['photo'] ?>" alt="<?= $account['name'] ?>"> <a href="/user/logOut.php">разлогинься.</a> </h2>
            <?php
            }
            ?>
        </div>
        <nav>
            <a href="/">Главная</a>
            <a href="/ourTreners.php">Наши тренера</a>
            <a href="/addTrener.php">Добавить тренера</a>
            <a href="/editTrener.php">Управление тренерами</a>
            <a href="/addOrder.php">Создать заявку</a>
            <?php
            if (!isset($user)) {
            ?>
                <a href="/user/signUp.php"><button>Регистрация</button></a>
                <a href="/user/signIn.php"><button>Вход</button></a>
            <?php
            }
            ?>
        </nav>
    </header>