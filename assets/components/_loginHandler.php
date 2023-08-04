<?php
$error = "false";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "_dbConnect.php";
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["userid"] = $row["id"];
            $_SESSION["name"] = $row["name"];

            header("Location: /notes-manager/index.php?success=true&alert=Login Successful...");
            exit();
        } else {
            echo $error = "Invalid Credentials!";
        }
    } else {
        echo $error = "Invalid Credentials!";
    }
    header("Location: /notes-manager/login.php?success=false&alert=$error");
}