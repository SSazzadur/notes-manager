<?php
session_start();
include './_dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $success = '';
    $alert = '';

    $note = $_POST['note'];

    if (!empty($note)) {
        $sql = "INSERT INTO notes (note, completed, u_id, timestamp) VALUES ('$note', 0, '$_SESSION[userid]', current_timestamp());";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $success = 'true';
            $alert = 'Note Added Successfully...';
        } else {
            $success = 'false';
            $alert = 'Error Adding Note...';
        }
    } else {
        $success = 'false';
        $alert = 'Note cannot be empty...';
    }

    header('Location: /web-programming/assignment/index.php?success=' . $success . '&alert=' . $alert);
}