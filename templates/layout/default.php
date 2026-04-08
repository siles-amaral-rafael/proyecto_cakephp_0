<?php
/**
* @var \App\View\AppView $this
*/
$appName = 'MediaVault';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?= $this->Html->charset() ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= h($appName) ?> — <?= $this->fetch('title') ?></title>
<?= $this->Html->meta('icon') ?>

<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
:root {
    --mv-primary: #6c5ce7; /* Violeta moderno tipo app de música */
    --mv-secondary: #a29bfe;
    --mv-bg: #fcfcfd;
    --mv-text: #2d3436;
}

body {
    font-family: 'Outfit', sans-serif;
    background-color: var(--mv-bg);
    color: var(--mv-text);
}

/* Navbar estilo flotante */
.navbar {
    background-color: rgba(255, 255, 255, 0.8) !important;
    backdrop-filter: blur(15px);
    border-bottom: 1px solid #eee;
    padding: 0.8rem 0;
}

.navbar-brand {
    font-weight: 600;
    color: var(--mv-primary) !important;
    letter-spacing: -0.5px;
    display: flex;
    align-items: center;
}

/* El reemplazo del icono de la torta */
.brand-icon {
    font-size: 1.5rem;
    margin-right: 8px;
    background: linear-gradient(45deg, var(--mv-primary), var(--mv-secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.nav-link {
    font-weight: 500;
    color: #636e72 !important;
    margin: 0 5px;
    border-radius: 8px;
    transition: all 0.2s;
}

.nav-link:hover {
    background-color: #f1f0ff;
    color: var(--mv-primary) !important;
}

/* Estilo para las tarjetas de contenido */
.card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(108, 92, 231, 0.05);
    background: #ffffff;
    overflow: hidden;
}

.card-header {
    background-color: #ffffff !important;
    border-bottom: 1px solid #f8f9fa !important;
    padding: 1.5rem 2rem;
}

/* Botones personalizados */
.btn-success {
    background-color: var(--mv-primary);
    border: none;
    border-radius: 12px;
    padding: 10px 24px;
    box-shadow: 0 4px 15px rgba(108, 92, 231, 0.2);
}

.btn-success:hover {
    background-color: #5b4bc4;
    transform: translateY(-1px);
}

/* Footer minimalista */
footer {
    background-color: #ffffff;
    border-top: 1px solid #eee;
    color: #b2bec3;
}

/* Paginación estilo musical */
.pagination .page-link {
    border: none;
    color: var(--mv-primary);
    margin: 0 3px;
    border-radius: 8px;
}

.pagination .active .page-link {
    background-color: var(--mv-primary);
}


.form-control, .form-select {
    border: 1px solid #eef0f2;
    padding: 0.75rem 1rem;
    background-color: #fcfcfd;
}

.form-control:focus, .form-select:focus {
    border-color: var(--mv-secondary);
    box-shadow: 0 0 0 4px rgba(108, 92, 231, 0.1);
    background-color: #fff;
}

.fw-600 {
    font-weight: 600;
}

/* Ajuste para que los botones de CakePHP usen tu clase btn-success */
button[type="submit"] {
    @extend .btn-success; /* Si usaras SASS, pero como es CSS plano: */
    background-color: var(--mv-primary);
    border: none;
    border-radius: 12px;
    padding: 10px 24px;
    color: white;
    transition: all 0.2s;
}

button[type="submit"]:hover {
    background-color: #5b4bc4;
    transform: translateY(-1px);
}
</style>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg sticky-top">
<div class="container">
<a class="navbar-brand" href="/">
<i class="bi bi-disc brand-icon"></i> <?= h($appName) ?>
</a>
<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
<span class="bi bi-list fs-2 text-dark"></span>
</button>
<div class="collapse navbar-collapse" id="mainNav">
<ul class="navbar-nav ms-auto align-items-center">
<?php if ($this->Identity->isLoggedIn()): ?>
<?php if ($this->Identity->get('role') === 'admin'): ?>
<li class="nav-item">
<?= $this->Html->link('<i class="bi bi-person-video2"></i> ' . __('Usuarios'), ['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>
<li class="nav-item">
<?= $this->Html->link('<i class="bi bi-layers"></i> ' . __('Multimedia'), ['prefix' => 'Admin', 'controller' => 'Multimedia', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>
<?php endif; ?>
<li class="nav-item ms-lg-3">
<?= $this->Html->link(__('Cerrar sesión'), ['prefix' => false, 'controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-outline-danger btn-sm rounded-pill px-3']) ?>
</li>
<?php else: ?>
<li class="nav-item">
<?= $this->Html->link(__('Entrar al Vault'), ['prefix' => false, 'controller' => 'Users', 'action' => 'login'], ['class' => 'btn btn-success']) ?>
</li>
<?php endif; ?>
</ul>
</div>
</div>
</nav>

<main class="flex-grow-1 py-5">
<div class="container">
<div class="mb-4">
<?= $this->Flash->render() ?>
</div>

<?= $this->fetch('content') ?>
</div>
</main>

<footer class="py-5">
<div class="container text-center">
<div class="mb-3 opacity-50">
<i class="bi bi-soundwave fs-3 mx-2"></i>
<i class="bi bi-mic fs-3 mx-2"></i>
<i class="bi bi-camera-reels fs-3 mx-2"></i>
</div>
<p class="mb-1 font-weight-bold" style="color: var(--mv-text)"><?= h($appName) ?></p>
<p class="small mb-0">© 2026 RSA · Resguardo de archivos audiovisuales.</p>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->fetch('script') ?>
</body>
</html>