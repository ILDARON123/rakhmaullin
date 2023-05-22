<?php
include("../header.php");
?>

<div class="container">
    <form action="signUpDB.php" method="post" enctype="multipart/form-data">
        <h2>Регистрация</h2>
        <div class="input-group"><input type="text" name="surname" id="surname" placeholder="Фамилия" required></div>
        <div class="input-group"><input type="text" name="name" id="name" placeholder="Имя" required></div>
        <div class="input-group"><input type="text" name="patronymic" id="patronymic" placeholder="Отчество (если есть)"></div>
        <!-- <div class="input-group"><input type="text" name="login" id="login" placeholder="Логин" required></div> -->
        <!-- <div class="input-group"><input type="text" name="email" id="email" placeholder="Почта" required></div> -->
        <div class="input-group"><input type="file" name="photo" id="photo"></div>
        <label for="" style="text-align: center">Выберите пол</label>
        <div class="input-group ig-radio">
            <label for="Gender-M"><input type="radio" name="gender" value="m" id="Gender-M">Муж.</label>
            <label for="Gender-F"><input type="radio" name="gender" value="f" id="Gender-F">Жен.</label>
        </div>
        <div class="input-group"><input type="date" name="birthday" placeholder="Дата рождения"><label for=""></label></div>
        <div class="input-group"><input type="number" name="phone" id="phone" placeholder="Телефон"></div>
        <div class="input-group"><input type="password" name="pass" id="pass" placeholder="Пароль" required></div>
        <div class="input-group"><input type="password" name="passRep" id="passRep" placeholder="Повтор пароля" required></div>
        <button type="submit" class="sign-btn">Зарегистрироваться</button>
        <div><a class="mini-text" href="signIn.php">Вход</a></div>
        <div id="err-mes" class="bold"><?= $_SESSION['result'] ?></div>
    </form>
</div>

<script>
    let pass = document.getElementById("pass");
    let passRep = document.getElementById("passRep");
    let form = document.getElementById("reg-form");
    let echoError = document.getElementById("err-mes");


    form.addEventListener("submit", function(event) {
        if (pass.value != passRep.value) {
            event.preventDefault();
            echoError.innerText = "Пароли не совпадают";
        }
    })
</script>

<?php
$_SESSION['result'] = null;
?>