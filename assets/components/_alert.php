<?php
if (isset($_GET['success'])) {
    $showAlert = true;
    if ($_GET['success'] == 'true') {
        $success = $_GET['success'];
    }

    $alertMsg = $_GET['alert'];
} else {
    $showAlert = false;
}
?>

<div class="alert <?php echo $showAlert ? 'active' : ''; ?> <?php echo $success ? 'success' : 'error'; ?>">
    <p>
        <?php echo $alertMsg; ?>
    </p>

    <div class="close">
        <span>&times;</span>
    </div>
</div>