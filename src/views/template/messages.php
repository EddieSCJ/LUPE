
<?php

if ($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];
}
?>

<?php if ($message): ?>
    <div class="alert alert-<?= $message['type'] == 'error' ? 'danger' : 'sucesses' ?> ocupe_all" role="alert">
        <?= $message['message']; ?>
    </div>
<?php endif ?>