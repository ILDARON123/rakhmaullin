<?php
include('header.php');
$result = $con->query("SELECT * from users where role=3");
$s_result = $_SESSION['result'];

$get_1st_id = $con->query("SELECT id_user FROM users WHERE role=3 limit 1");

$idTrener = !empty($_GET['idTrener']) ? $_GET['idTrener'] : 1;
$query = "SELECT * from users where id_user=" . $idTrener;
$trenerInfo = mysqli_query($con, $query);
$trenerInfo = mysqli_fetch_array($trenerInfo);
?>
<div class="container flex">
    <div class="trener-list">
        <?php
        while ($trener = mysqli_fetch_assoc($result)) {
        ?>
            <div class="trener-icon flex">
                <p><?= $trener["surname"] . " " . $trener["name"] . " " . $trener["patronymic"]; ?></p>
                <div>
                    <a href="?idTrener=<?= $trener['id_user']; ?>"><button class="btn-edit">&#9998</button></a>
                    <a href="/delTrenerDB.php?idTrener=<?= $trener['id_user']; ?>"><button class="btn-del">&#215</button></a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <!-- Отправить файлы с формы редактирования в editTrenerDB.php -->
    <!-- Там проверить, есть ли разница между данными из формы и данными из таблицы -->
    <!-- Если есть, то выборочно заменить эти данные из базы данными с формы -->
    <div class="form-edit">
        <div class="container flex">
            <form action="/editTrenerDB.php" method="post" enctype="multipart/form-data">
                <h2>Добавить тренера</h2>
                <div class="input-group"><input type="text" name="surname" id="surname" placeholder="Фамилия" value="<?= $trenerInfo['surname']; ?>" /></div>
                <div class="input-group"><input type="text" name="name" placeholder="Имя" value="<?= $trenerInfo['name']; ?>" /></div>
                <div class="input-group"><input type="text" name="patronymic" placeholder="Отчество" value="<?= $trenerInfo['patronymic']; ?>" /></div>
                <div class="input-group"><input type="file" name="photo" placeholder="Название фото" value="<?= $trenerInfo['photo']; ?>" /><label for=""></label></div>
                <label for="" style="text-align: center">Выберите пол</label>
                <div class="input-group ig-radio">
                    <label for="Gender-M"><input type="radio" name="gender" value="m" id="Gender-M" <?= ($trenerInfo['gender'] == 'm') ? 'checked' : ""; ?>>Муж.</label>
                    <label for="Gender-F"><input type="radio" name="gender" value="f" id="Gender-F" <?= ($trenerInfo['gender'] == 'f') ? 'checked' : ""; ?>>Жен.</label>
                </div>
                <div class="input-group"><input type="number" name="phone" placeholder="Телефон" value="<?= $trenerInfo['phone']; ?>" /></div>
                <div class="input-group"><input type="password" name="password" placeholder="Пароль" value="<?= $trenerInfo['password']; ?>"><label for=""></label></div>
                <div class="input-group"><input type="date" name="birthday" placeholder="Дата рождения" value="<?= $trenerInfo['birthday']; ?>"><label for=""></label></div>
                <div class="input-group"><input type="text" name="awards" placeholder="Награды" value="<?= $trenerInfo['awards']; ?>"><label for=""></label></div>
                <input value="<?= $trenerInfo['id_user']; ?>" name="id" style="display: none;"></input>
                <div class="input-group"><button class="sub-btn" type="submit">Обновить</button></div>
                <p><?= $_SESSION['result']; ?></p>
            </form>
        </div>
    </div>
<?php
$_SESSION['result'] = null;
?>