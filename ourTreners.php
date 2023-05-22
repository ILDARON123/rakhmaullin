<?php
include "header.php";
?>
<div class="cards">
    <?php

    $sql_query = "SELECT * from users where role=3 LIMIT 3";
    $result = mysqli_query($con, $sql_query);
    while ($trener = mysqli_fetch_assoc($result)) {
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