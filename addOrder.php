<?php
require_once("header.php");

$query = "SELECT * FROM `users` WHERE role = 3";
$res = $con->query($query);
$trainers = $res->fetch_all(MYSQLI_ASSOC);
?>
<form action="addOrderDB.php" method="get">
  <select name="trainer" id="">
    <?php
    foreach ($trainers as $trainer) {
    ?>
      <option value="<?= $trainer['id_user'] ?>"><?= $trainer["surname"] . " " . $trainer["name"] . " " . $trainer["patronymic"]; ?></option>
    <?php
    }
    if (!$user) {
    }
    ?>
  </select>
  <button>Создать заявку</button>
</form>