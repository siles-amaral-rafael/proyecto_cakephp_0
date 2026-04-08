<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Multimedia $multimedia
*/
$this->assign('title', __('Añadir al Vault'));
?>

<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card">
<div class="card-header">
<h2 class="h5 mb-0 fw-bold">
<i class="bi bi-plus-circle-dotted me-2 text-primary"></i><?= __('Registrar Nuevo Multimedia') ?>
</h2>
</div>

<div class="card-body p-4 p-md-5">
<?= $this->Form->create($multimedia, ['class' => 'row g-4']) ?>

<div class="col-12">
<?= $this->Form->control('titulo', [
    'label' => ['class' => 'form-label fw-600', 'text' => __('Título de la Obra')],
    'placeholder' => 'Ej: El resplandor',
    'class' => 'form-control rounded-3'
]) ?>
</div>

<div class="col-md-6">
<?= $this->Form->control('tipo', [
    'label' => ['class' => 'form-label fw-600'],
    'type' => 'select',
    'options' => [
        'video' => '📹 Video',
        'audio' => '🎵 Audio',
    ],
    'empty' => __('Seleccione tipo...'),
    'class' => 'form-select rounded-3'
]) ?>
</div>

<div class="col-md-6">
<?= $this->Form->control('año', [
    'label' => ['class' => 'form-label fw-600'],
    'type' => 'date',
    'class' => 'form-control rounded-3'
]) ?>
</div>

<div class="col-12">
<label class="form-label fw-600"><?= __('Ubicación del Archivo') ?></label>
<div class="input-group">
<span class="input-group-text bg-light border-end-0">
<i class="bi bi-hdd-network text-primary"></i>
</span>
<?= $this->Form->text('ruta_archivo', [
    'class' => 'form-control border-start-0 rounded-end-3',
    'list' => 'folderSuggestions',
    'placeholder' => 'resources/uploads/...'
]) ?>
</div>
<datalist id="folderSuggestions">
<option value="resources/uploads/videos/">
<option value="resources/uploads/audios/">
<option value="https://www.youtube.com/watch?v=">
</datalist>
</div>

<div class="col-md-6">
<?= $this->Form->control('autor', [
    'label' => ['class' => 'form-label fw-600'],
    'class' => 'form-control rounded-3'
]) ?>
</div>

<div class="col-md-6">
<?= $this->Form->control('album', [
    'label' => ['class' => 'form-label fw-600'],
    'class' => 'form-control rounded-3'
]) ?>
</div>

<div class="col-12 mt-5 text-end">
<?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'text-decoration-none text-muted me-3']) ?>
<?= $this->Form->button(__('Guardar en Vault'), ['class' => 'btn btn-success px-5']) ?>
</div>

<?= $this->Form->end() ?>
</div>
</div>
</div>
</div>