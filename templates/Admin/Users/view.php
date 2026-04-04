<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', __('Usuario #{0}', $user->id));
?>
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
        <h1 class="h4 mb-0"><?= __('Usuario') ?></h1>
        <div class="d-flex flex-wrap gap-2">
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= $this->Html->link(__('Volver al listado'), ['action' => 'index'], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
        </div>
    </div>
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3 text-muted"><?= __('Id') ?></dt>
            <dd class="col-sm-9"><?= $this->Number->format($user->id) ?></dd>
            <dt class="col-sm-3 text-muted"><?= __('Nombre') ?></dt>
            <dd class="col-sm-9"><?= h($user->nombre) ?></dd>
            <dt class="col-sm-3 text-muted"><?= __('Apellido') ?></dt>
            <dd class="col-sm-9"><?= h($user->apellido) ?></dd>
            <dt class="col-sm-3 text-muted"><?= __('Correo') ?></dt>
            <dd class="col-sm-9"><?= h($user->correo) ?></dd>
            <dt class="col-sm-3 text-muted"><?= __('Rol') ?></dt>
            <dd class="col-sm-9">
                <?php if ($user->role === 'admin'): ?>
                    <span class="badge text-bg-primary"><?= h($user->role) ?></span>
                <?php else: ?>
                    <span class="badge text-bg-secondary"><?= h($user->role) ?></span>
                <?php endif; ?>
            </dd>
            <dt class="col-sm-3 text-muted"><?= __('Idioma') ?></dt>
            <dd class="col-sm-9"><?= h($user->language) ?></dd>
            <dt class="col-sm-3 text-muted"><?= __('Creado') ?></dt>
            <dd class="col-sm-9"><?php
                $c = $user->created;
                echo $c instanceof \DateTimeInterface ? h($c->format('Y-m-d H:i:s')) : '';
            ?></dd>
            <dt class="col-sm-3 text-muted"><?= __('Modificado') ?></dt>
            <dd class="col-sm-9"><?php
                $m = $user->modified;
                echo $m instanceof \DateTimeInterface ? h($m->format('Y-m-d H:i:s')) : '';
            ?></dd>
        </dl>
    </div>
</div>
