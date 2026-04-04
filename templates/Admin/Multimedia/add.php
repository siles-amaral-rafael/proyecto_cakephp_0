<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Multimedia $multimedia
 */
$this->assign('title', __('Nuevo multimedia'));
?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h1 class="h4 mb-0"><?= __('Nuevo registro') ?></h1>
            </div>
            <div class="card-body p-4">
                <?= $this->Form->create($multimedia) ?>
                <?= $this->Form->control('titulo', ['label' => __('Título')]) ?>
                <?= $this->Form->control('tipo', ['label' => __('Tipo')]) ?>
                <?= $this->Form->control('ruta_archivo', ['label' => __('Ruta del archivo')]) ?>
                <?= $this->Form->control('autor', ['label' => __('Autor')]) ?>
                <?= $this->Form->control('año', ['label' => __('Año'), 'type' => 'date']) ?>
                <?= $this->Form->control('album', ['label' => __('Álbum')]) ?>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    <?= $this->Form->button(__('Guardar')) ?>
                    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
