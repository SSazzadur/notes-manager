<?php
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include './_dbconnect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //Checking the existance
    $existSql = "SELECT * FROM users WHERE email='$email'";
    $existResult = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($existResult);

    if ($numRows > 0) {
        $error = "Email already in use...";
    } else {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (`name`, `email`, `password`, `timestamp`) VALUES ('$name', '$email', '$hash', current_timestamp());";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['userid'] = mysqli_insert_id($conn);

                header("Location: /notes-manager/index.php?success=true&alert=Registration Successful...");
                exit();
            } else {
                $error = "Something went wrong...";
            }
        } else {
            $error = "Passwords do not match...";
        }
    }

    header("Location: /notes-manager/login.php?success=false&alert=$error");
}