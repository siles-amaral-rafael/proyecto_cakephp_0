<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', __('Editar usuario'));
?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h1 class="h4 mb-0"><?= __('Editar usuario') ?></h1>
            </div>
            <div class="card-body p-4">
                <?= $this->Form->create($user) ?>
                <?= $this->Form->control('nombre', ['label' => __('Nombre')]) ?>
                <?= $this->Form->control('apellido', ['label' => __('Apellido')]) ?>
                <?= $this->Form->control('correo', ['label' => __('Correo')]) ?>
                <?= $this->Form->control('password', [
                    'label' => __('Nueva contraseña (dejar vacío para no cambiar)'),
                    'type' => 'password',
                    'value' => '',
                    'required' => false,
                ]) ?>
                <?= $this->Form->control('language', ['label' => __('Idioma')]) ?>
                <?= $this->Form->control('role', [
                    'label' => __('Rol'),
                    'options' => ['admin' => 'admin', 'user' => 'user'],
                ]) ?>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    <?= $this->Form->button(__('Guardar')) ?>
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
