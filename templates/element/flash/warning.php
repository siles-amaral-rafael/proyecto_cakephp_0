<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
$extra = $params['class'] ?? '';
?>
<div class="alert alert-warning alert-dismissible fade show <?= h($extra) ?>" role="alert">
    <?= $message ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="<?= __('Cerrar') ?>"></button>
</div>
