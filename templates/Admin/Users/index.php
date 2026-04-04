<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
$this->assign('title', __('Usuarios'));
?>
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
        <h1 class="h4 mb-0"><?= __('Usuarios') ?></h1>
        <?= $this->Html->link(
            __('Nuevo usuario'),
            ['action' => 'add'],
            ['class' => 'btn btn-success'],
        ) ?>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th><?= $this->Paginator->sort('id', __('Id')) ?></th>
                        <th><?= $this->Paginator->sort('nombre', __('Nombre')) ?></th>
                        <th><?= $this->Paginator->sort('apellido', __('Apellido')) ?></th>
                        <th><?= $this->Paginator->sort('correo', __('Correo')) ?></th>
                        <th><?= $this->Paginator->sort('role', __('Rol')) ?></th>
                        <th class="text-end"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->nombre) ?></td>
                        <td><?= h($user->apellido) ?></td>
                        <td><?= h($user->correo) ?></td>
                        <td>
                            <?php if ($user->role === 'admin'): ?>
                                <span class="badge text-bg-primary"><?= h($user->role) ?></span>
                            <?php else: ?>
                                <span class="badge text-bg-secondary"><?= h($user->role) ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end actions">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                            <?= $this->Form->postLink(
                                __('Eliminar'),
                                ['action' => 'delete', $user->id],
                                ['class' => 'btn btn-sm btn-outline-danger', 'confirm' => __('¿Eliminar #{0}?', $user->id)],
                            ) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white">
        <nav aria-label="<?= __('Paginación') ?>">
            <ul class="pagination justify-content-center mb-2 flex-wrap">
                <?= $this->Paginator->first('« ' . __('primero')) ?>
                <?= $this->Paginator->prev('< ' . __('anterior')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('siguiente') . ' >') ?>
                <?= $this->Paginator->last(__('último') . ' »') ?>
            </ul>
        </nav>
        <p class="text-center text-muted small mb-0"><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} de {{count}}')) ?></p>
    </div>
</div>
<p class="mt-3">
    <?= $this->Html->link(
        __('Ir a multimedia'),
        ['controller' => 'Multimedia', 'action' => 'index'],
        ['class' => 'btn btn-outline-primary'],
    ) ?>
</p>
