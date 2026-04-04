<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Multimedia> $multimedia
 */
$this->assign('title', __('Multimedia'));
?>
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
        <h1 class="h4 mb-0"><?= __('Multimedia') ?></h1>
        <?= $this->Html->link(__('Nuevo registro'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th><?= $this->Paginator->sort('id', __('Id')) ?></th>
                        <th><?= $this->Paginator->sort('titulo', __('Título')) ?></th>
                        <th><?= $this->Paginator->sort('tipo', __('Tipo')) ?></th>
                        <th><?= __('Ruta') ?></th>
                        <th><?= $this->Paginator->sort('autor', __('Autor')) ?></th>
                        <th><?= __('Año') ?></th>
                        <th><?= $this->Paginator->sort('album', __('Álbum')) ?></th>
                        <th class="text-end"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($multimedia as $row): ?>
                    <tr>
                        <td><?= $this->Number->format($row->id) ?></td>
                        <td><?= h($row->titulo) ?></td>
                        <td><span class="badge text-bg-info text-dark"><?= h($row->tipo) ?></span></td>
                        <td><code class="small"><?= h($row->ruta_archivo) ?></code></td>
                        <td><?= h($row->autor) ?></td>
                        <td><?php
                            $año = $row->año;
                            echo $año !== null && $año instanceof \DateTimeInterface
                                ? h($año->format('Y-m-d'))
                                : h($año ?? '');
                            ?></td>
                        <td><?= h($row->album) ?></td>
                        <td class="text-end actions">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $row->id], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $row->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                            <?= $this->Form->postLink(
                                __('Eliminar'),
                                ['action' => 'delete', $row->id],
                                ['class' => 'btn btn-sm btn-outline-danger', 'confirm' => __('¿Eliminar #{0}?', $row->id)],
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
        __('Volver a usuarios'),
        ['controller' => 'Users', 'action' => 'index'],
        ['class' => 'btn btn-outline-primary'],
    ) ?>
</p>
