<?php
/**
 * @var \App\View\AppView $this
 */
$appName = 'App EF';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($appName) ?> — <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?= $this->Html->css('app') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="d-flex flex-column min-vh-100 bg-body-tertiary">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <?= $this->Html->link($appName, '/', ['class' => 'navbar-brand']) ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-1">
                    <?php if ($this->Identity->isLoggedIn()): ?>
                        <?php if ($this->Identity->get('role') === 'admin'): ?>
                            <li class="nav-item">
                                <?= $this->Html->link(__('Usuarios'), ['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link(__('Multimedia'), ['prefix' => 'Admin', 'controller' => 'Multimedia', 'action' => 'index'], ['class' => 'nav-link']) ?>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <?= $this->Html->link(__('Mi portal'), ['prefix' => false, 'controller' => 'Portal', 'action' => 'index'], ['class' => 'nav-link']) ?>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <?= $this->Html->link(__('Cerrar sesión'), ['prefix' => false, 'controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']) ?>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <?= $this->Html->link(__('Entrar'), ['prefix' => false, 'controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link active']) ?>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="https://book.cakephp.org/5/" target="_blank" rel="noopener"><?= __('Docs CakePHP') ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1 py-4 py-md-5">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer class="py-3 mt-auto bg-white border-top">
        <div class="container text-center text-muted small">
            <?= h($appName) ?> · CakePHP <?= h(\Cake\Core\Configure::version()) ?>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?= $this->fetch('script') ?>
</body>
</html>
