<?php
/**
* @var \App\View\AppView $this
* @var iterable<\App\Model\Entity\User> $usuarios
* @var iterable<\App\Model\Entity\Multimedia> $multimedia
*/
$this->assign('title', $title ?? __('Portal'));
?>

<style>
/* Estilos para que la paginación combine con MediaVault */
.pagination {
    gap: 5px;
}
.page-item .page-link {
    border-radius: 10px !important;
    color: var(--mv-primary);
    border: 1px solid #eee;
    padding: 8px 16px;
    font-weight: 600;
}
.page-item.active .page-link {
    background-color: var(--mv-primary);
    border-color: var(--mv-primary);
    color: white;
}
.welcome-gradient {
    background: linear-gradient(135deg, var(--mv-primary), var(--mv-secondary));
    border-radius: 24px;
}
</style>

<div class="welcome-gradient text-white p-5 mb-5 shadow-lg">
<h1 class="fw-bold mb-1"><?= __('Tu Vault Personal') ?></h1>
<p class="opacity-75 mb-0"><?= h($this->Identity->get('nombre')) ?>, aquí puedes explorar todo el contenido disponible.</p>
</div>

<div class="row g-4">
<div class="col-xl-4">
<div class="card border-0 shadow-sm rounded-4">
<div class="card-header bg-white py-3">
<h6 class="mb-0 fw-bold text-primary"><?= __('Comunidad') ?></h6>
</div>
<div class="card-body p-0">
<ul class="list-group list-group-flush">
<?php foreach ($usuarios as $user): ?>
<li class="list-group-item border-0 py-3">
<div class="d-flex align-items-center">
<div class="rounded-circle bg-light p-2 me-3">
<i class="bi bi-person text-secondary"></i>
</div>
<div>
<div class="fw-bold small"><?= h($user->nombre) ?></div>
<div class="text-muted" style="font-size: 0.7rem;"><?= h($user->correo) ?></div>
</div>
</div>
</li>
<?php endforeach; ?>
</ul>
</div>
</div>
</div>

<div class="col-xl-8">
<div class="card border-0 shadow-sm rounded-4">
<div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
<h6 class="mb-0 fw-bold text-primary"><?= __('Archivos en el Vault') ?></h6>
<span class="small text-muted">
<?= $this->Paginator->counter('{{count}} archivos en total') ?>
</span>
</div>
<div class="card-body p-0">
<div class="table-responsive">
<table class="table align-middle mb-0">
<thead class="bg-light">
<tr>
<th class="ps-4"><?= $this->Paginator->sort('titulo', __('Título')) ?></th>
<th><?= __('Tipo') ?></th>
<th class="pe-4"><?= __('Autor') ?></th>
</tr>
</thead>
<tbody>
<?php foreach ($multimedia as $item): ?>
<tr>
<td class="ps-4">
<div class="fw-bold"><?= h($item->titulo) ?></div>
<div class="text-muted small"><?= h($item->album) ?></div>
</td>
<td>
<span class="badge bg-light text-primary border rounded-pill px-3">
<?= h($item->tipo) ?>
</span>
</td>
<td class="pe-4 small text-muted">
<?= h($item->autor) ?> (<?= h($item->año->format('Y')) ?>)
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<div class="card-footer bg-white border-0 py-4">
<nav aria-label="Navegación de multimedia">
<ul class="pagination justify-content-center mb-0">
<?= $this->Paginator->first('<<') ?>
<?= $this->Paginator->prev('<') ?>
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next('>') ?>
<?= $this->Paginator->last('>>') ?>
</ul>
</nav>
</div>
</div>
</div>
</div>