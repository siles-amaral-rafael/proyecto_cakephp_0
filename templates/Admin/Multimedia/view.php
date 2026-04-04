<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Multimedia $multimedia
 */
$this->assign('title', __('Multimedia #{0}', $multimedia->id));
$año = $multimedia->año;
$añoStr = '';
if ($año !== null && $año instanceof \DateTimeInterface) {
    $añoStr = $año->format('Y-m-d');
} elseif ($año !== null) {
    $añoStr = (string)$año;
}
?>
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
        <h1 class="h4 mb-0"><?= __('Multimedia') ?></h1>
        <div class="d-flex flex-wrap gap-2">
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $multimedia->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= $this->Html->link(__('Volver al listado'), ['action' => 'index'], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
        </div>
    </div>
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3 text-muted"><?= __('Id') ?></dt>
            <dd class="col-sm-9"><?= $this->Number->format($multimedia->id) ?></dd>
            <dt class="col-sm-3 text-muted"><?= __('Título') ?></dt>
            <dd class="col-sm-9"><?= h($multimedia->titulo) ?></dd>
            <dt class="col-sm-3 text-muted"><?= __('Tipo') ?></dt>
            <dd class="col-sm-9"><span class="badge text-bg-info text-dark"><?= h($multimedia->tipo) ?></span></dd>
            <dt class="col-sm-3 text-muted"><?= __('Ruta del archivo') ?></dt>
            <dd class="col-sm-9"><code><?= h($multimedia->ruta_archivo) ?></code></dd>
            <dt class="col-sm-3 text-muted"><?= __('Autor') ?></dt>
            <dd class="col-sm-9"><?= h($multimedia->autor) ?></dd>
            <dt class="col-sm-3 text-muted"><?= __('Año') ?></dt>
            <dd class="col-sm-9"><?= h($añoStr) ?></dd>
            <dt class="col-sm-3 text-muted"><?= __('Álbum') ?></dt>
            <dd class="col-sm-9"><?= h($multimedia->album) ?></dd>
        </dl>
    </div>
</div>
