<?php
/**
 * @var \App\View\AppView $this
 */
$this->assign('title', $title ?? __('Portal'));
?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="bg-primary text-white p-4 p-md-5">
                <h1 class="h3 mb-2"><?= __('Bienvenido') ?></h1>
                <?php if ($this->Identity->isLoggedIn()): ?>
                    <p class="mb-0 opacity-90 lead">
                        <?= __('Hola, {0} {1}.', h((string)$this->Identity->get('nombre')), h((string)$this->Identity->get('apellido'))) ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="card-body p-4 p-md-5">
                <p class="mb-0 text-secondary"><?= __('Esta es su área de usuario. Desde el menú superior puede cerrar sesión cuando termine.') ?></p>
            </div>
        </div>
    </div>
</div>
