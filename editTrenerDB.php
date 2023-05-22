<?php
include("header.php");

// Принятие id
$editTrenerId = $_POST['id'];

// Получение остальных данных из формы в общий массив
$newTrener['surname'] = $_POST['surname'];
$newTrener['name'] = $_POST['name'];
$newTrener['patronymic'] = ($_POST['patronymic'] == false) ? "NULL" : "'" . $_POST['patronymic'] . "'";
$newTrener['phone'] = $_POST['phone'];
$newTrener['password'] = $_POST['password'];
$newTrener['birthday'] = date($_POST['birthday']); 
$newTrener['gender'] = $_POST['gender'];
$newTrener['awards'] = ($_POST['awards'] == false) ? "NULL" : "'" . $_POST['awards'] . "'";

// Получение данных из таблицы в виде массива
$q_oldTrener = "SELECT * FROM users WHERE `id_user` = $editTrenerId";
$oldTrener = $con->query($q_oldTrener);
$oldTrener = mysqli_fetch_assoc($oldTrener);

// Подгонка данных из таблицы под массив, получаемый из формы
unset($oldTrener['id_user'], $oldTrener['created_at'], $oldTrener['role']);
$oldTrener['patronymic'] = (empty($oldTrener['patronymic'])) ? "NULL" : "'" . $oldTrener['patronymic'] . "'";
$oldTrener['awards'] = (empty($oldTrener['awards'])) ? "NULL" : "'" . $oldTrener['awards'] . "'";

// Проверка массивов на идентичность
if ($oldTrener != $newTrener) {
    // SQL запрос на редактирование
    $qUpdateTrenerData = "UPDATE users SET 
    `surname`='" . $newTrener['surname'] . "',
    `name`='" . $newTrener['name'] . "',
    `patronymic`=" . $newTrener['patronymic'] . ",
    `phone`='" . $newTrener['phone'] . "',
    `password`='" . $newTrener['password'] . "',
    `birthday`='" . $newTrener['birthday'] . "',
    `gender`='" . $newTrener['gender'] . "',
    `awards`=" . $newTrener['awards'] . "
    WHERE id_user = " . $editTrenerId;
    echo $qUpdateTrenerData;
    $UpdateTrenerData = $con->query($qUpdateTrenerData);


    // Проверка залит ли в форму файл
    if (!empty($_FILES['photo']['name'])) {
        // Присвоение нужных переменных для дальнейшего использования
        $photo_name = $_FILES['photo']['name']; /* Для записи в БД*/
        $moveTo = "img/treners/" . $photo_name; /* Для загрузки изображения на сервер */
        move_uploaded_file($_FILES['photo']['tmp_name'], $moveTo);

        $UpdateTrenerPhoto = $con->query(
            "UPDATE users SET `photo`='$photo_name' WHERE id_user = " . $editTrenerId
        );
    }

    // Возвращение на начальную страницу результата
    $_SESSION['result'] = "Изменения внесены";
} else {
    // Возвращение на начальную страницу результата
    $_SESSION['result'] = "Информация идентична";
}

/* 
Возвращение на editTrener.php, 
методом $_GET отсылаем также данные о том тренере, которого мы редактировали.
Нужно чтобы после обработки тренеров страница отправки формы выглядела также, а не сбрасывалась до стартового вида
*/
header('Location: editTrener.php?idTrener=' . $_POST['id']);
exit();
