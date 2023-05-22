<?php
include("../header.php");
?>

<div class="container">
    <form action="signInDB.php" method="post" class="ctrl-e" id="reg-form">
        <div class="input-group"><input type="text" name="login" placeholder="Телефон"></div>
        <div class="input-group"><input type="password" name="pass" placeholder="Пароль"></div>
        <button type="submit" class="sign-btn">Вход</button>
        <div><a class="mini-text" href="signUp.php">Регистрация</a></div>
        <div id="err-mes" class="bold"><?= $_SESSION['result'] ?></div>
    </form>
</div>

<?php
$_SESSION['result'] = null;
?>