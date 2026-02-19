<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?php echo e($title ?? 'Sistema de Reservas'); ?></title>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte-fixes.css')); ?>">

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

    
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-sm btn-danger">Sair</button>
                </form>
            </li>
        </ul>
    </nav>

    
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">Reservas Online</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">

                   <li class="nav-item">
    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item">
    <a href="<?php echo e(route('reservas')); ?>" class="nav-link">
        <i class="nav-icon fas fa-calendar"></i>
        <p>Reservas</p>
    </a>
</li>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->isAdmin()): ?>
    <li class="nav-item">
        <a href="<?php echo e(route('usuarios')); ?>" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Usuários</p>
        </a>
    </li>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


                </ul>
            </nav>
        </div>
    </aside>

    
    <div class="content-wrapper p-4">
        <?php echo e($slot); ?>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\Users\vboxuser\reservas-online\app-reservas-on\resources\views/layouts/adminlte.blade.php ENDPATH**/ ?>