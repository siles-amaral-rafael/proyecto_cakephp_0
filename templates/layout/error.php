<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="bg-body-tertiary">
    <div class="container py-5">
        <?= $this->Flash->render() ?>
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <?= $this->fetch('content') ?>
                <p class="mb-0 mt-3">
                    <?= $this->Html->link(__('Volver'), 'javascript:history.back()', ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
