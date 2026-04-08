<?php
/**
 * @var \App\View\AppView $this
 */
$this->assign('title', __('Iniciar sesión'));
?>
<div class="login-page">
    <div class="card shadow border-0">
        <div class="card-body p-4 p-md-5">
            <h1 class="h4 text-center mb-4 text-primary"><?= __('Login') ?></h1>
            <?= $this->Form->create(null, ['url' => ['action' => 'login']]) ?>
            <?= $this->Form->control('correo', [
                'label' => __('Correo electrónico'),
                'required' => true,
                'autocomplete' => 'username',
                'placeholder' => 'nombre@ejemplo.com',
            ]) ?>
            <?= $this->Form->control('password', [
                'label' => __('Contraseña'),
                'required' => true,
                'autocomplete' => 'current-password',
                'type' => 'password',
            ]) ?>
            <div class="d-grid gap-2 mt-4">
                <?= $this->Form->button(__('Ingresar'), ['class' => 'btn-lg']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <p class="text-center text-muted small mt-3 mb-0"><?= __('Use el correo y la contraseña de su cuenta.') ?></p>
</div>
