
<?php
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}elseif ($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];
}
?>

<?php if ($message): ?>
    <div class="alert alert-<?= $message['type'] == 'error' ? 'danger' : 'success' ?> ocupe_all" role="alert">
        <?= $message['message']; ?>
    </div>
<?php endif ?>