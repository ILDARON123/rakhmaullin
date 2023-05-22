<?php
include "header.php";
?>
<div class="cards">
    <?php
    $sql_query = "select surname,name,patronymic,photo,awards,phone from users where role=3";
    $result = mysqli_query($con, $sql_query);
    while ($trener = mysqli_fetch_assoc($result)) {
        // print_r($trener);
        // echo"<br><br>";
    ?>
        <div class="card">
            <div class="img-container">
                <img src="./img/treners/<?= $trener["photo"]; ?>" alt="">
            </div>
            <h2><?= $trener["surname"] . " " . $trener["name"] . " " . $trener["patronymic"]; ?></h2>
            <p><?= $trener["phone"]; ?></p>
            <p><?= $trener["awards"]; ?></p>
        </div>
    <?php
    }
    ?>
</div>

</body>

</html>