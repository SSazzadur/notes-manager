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


    $sql = "DELETE FROM notes WHERE id = $note_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $success = 'true';
        $alert = 'Note deleted successfully';
    } else {
        $alert = 'Error deleting note';
    }


    header('Location: /notes-manager/index.php?success=' . $success . '&alert=' . $alert);
}