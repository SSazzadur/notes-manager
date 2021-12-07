<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;

    echo '<p>You are logged in!</p>';
    echo '<p>Name: ' . $_SESSION['name'] . '</p>';
    echo '<p>Email: ' . $_SESSION['email'] . '</p>';
    echo '<p>Id: ' . $_SESSION['userid'] . '</p>';

    echo '<a href="logout.php">Logout</a>';
} else {
    $loggedin = false;
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <?php include './assets/components/_alert.php' ?>

    <script src="./assets/js/app.js"></script>

</body>

</html>