<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    $loggedin = false;
    header('Location: login.php');
    exit();
}

$success = 'false';
$alert = '';

if (isset($_GET['noteid'])) {
    include './_dbconnect.php';
    $note_id = $_GET['noteid'];

    $sql = "SELECT * FROM notes WHERE id = $note_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row['completed'] == 1) {
            $completed = 0;
        } else {
            $completed = 1;
        }

        $update = "UPDATE notes SET completed = $completed WHERE id = $note_id";
        $result = mysqli_query($conn, $update);
        if ($result) {
            $success = 'true';

            if ($completed === 1) {
                $alert = 'Note marked as complete...';
            } else {
                $alert = 'Note marked as incomplete...';
            }
        } else {
            $success = 'false';
            $alert = 'Error marking note as complete...';
        }
    } else {
        $success = 'false';
        $alert = 'Note not found...';
    }

    header('Location: /web-programming/assignment/index.php?success=' . $success . '&alert=' . $alert);
}