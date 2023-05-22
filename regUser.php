<?php
include('header.php');
?>

<div class="container">
    <form action="signUp.php" method="post" enctype="multipart/form-data">
        <h2>Регистрация</h2>
        <div class="input-group"><input type="text" name="surname" placeholder="Фамилия" /></div>
        <div class="input-group"><input type="text" name="name" placeholder="Имя" /></div>
        <div class="input-group"><input type="text" name="patronymic" placeholder="Отчество" /></div>
        <div class="input-group"><input type="file" name="photo" placeholder="Название фото"><label for=""></label></div>
        <label for="" style="text-align: center">Выберите пол</label>
        <div class="input-group ig-radio">
            <label for="Gender-M"><input type="radio" name="gender" value="m" id="Gender-M">Муж.</label>
            <label for="Gender-F"><input type="radio" name="gender" value="f" id="Gender-F">Жен.</label>
        </div>
        <div class="input-group"><input type="number" name="phone" placeholder="Телефон" /></div>
        <div class="input-group"><input type="date" name="birthday" placeholder="Дата рождения"><label for=""></label></div>
        <div class="input-group"><input type="password" name="password" placeholder="Пароль"><label for=""></label></div>
        <div class="input-group"><input type="password" name="password-repeat" placeholder="Повтор пароля"><label for=""></label></div>
        <div class="input-group"><button class="sub-btn" type="submit">Добавить</button></div>
        <p><?= $_SESSION['result']; ?></p>
    </form>
</div>