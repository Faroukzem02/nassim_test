<?php
    include "connection.php";
    session_start();
    if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    } else {
    $user_id = '';
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nassim shop history</title>
    <link rel="icon" href="imgs/nassim_logo.png" type="image/x-icon">
    <style><?php include "dash_style.css"?></style>
</head>
<body>
    <div class="history_div">
        <div class="history_container">
            <?php
                if(isset($_GET["pid"])){
                    $pid=$_GET["pid"];
                    $select_history = $conn -> prepare("SELECT * FROM `histories` WHERE id='$pid' ");
                    $select_history -> execute();
                    $fetch_history = $select_history->fetch(PDO::FETCH_ASSOC);
                }
            ?>
            <h1>Command N° <?=$fetch_history["name"]?></h1>
        </div>
    </div>
    <script><?php include "script.js"?></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include "alert.php" ?>
</body>
</html>