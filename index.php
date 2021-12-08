<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    $loggedin = false;
    header('Location: login.php');
    exit();
}

include './assets/components/_dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include './assets/components/_alert.php' ?>

    <div class="notes-container">
        <header>
            <h1><?php echo $_SESSION['name'] ?>'s Notes</h1>
            <a href="logout.php" class="logout">Logout</a>
        </header>

        <form action="./assets/components/_noteAddHandler.php" method="POST">
            <input type="text" class="todo-input" name="note" />
            <button class="todo-button" type="submit">
                <i class="fas fa-plus-square"></i>
            </button>
        </form>

        <div class="todo-container">
            <ul class="todo-list">

                <?php
                $sql = "SELECT * FROM notes WHERE u_id = " . $_SESSION['userid'];
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        $row['completed'] == 1 ? $class = 'todo completed' : $class = 'todo';

                        echo '<div class="' . $class . '">
                                <li class="todo-item">' . $row['note'] . '</li>
                                <a class="complete-btn" href="./assets/components/_completeHandler.php?noteid='
                            . $row['id'] . '">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a class="trash-btn" href="./assets/components/_deleteHandler.php?noteid='
                            . $row['id'] . '">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>';
                    }
                } else {
                    echo '<h3>No notes yet!</h3>';
                    echo '<p>Add a note by clicking the + button above.</p>';
                }
                ?>
            </ul>
        </div>
    </div>

    <script src="./assets/js/app.js"></script>
</body>

</html>