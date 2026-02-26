<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/dist/css/adminlte.min.css')); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    
<div class="wrapper">

    
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
</nav>

   
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo e(route('dashboard')); ?>" class="brand-link">
        <span class="brand-text font-weight-light">Reservas Online</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                
                <li class="nav-item">
                    <a href="<?php echo e(route('dashboard')); ?>"
                       class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a href="<?php echo e(route('reservas.index')); ?>"
                       class="nav-link <?php echo e(request()->routeIs('reservas.*') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Reservas</p>
                    </a>
                </li>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->is_admin): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('users.index')); ?>"
                       class="nav-link <?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Usuários</p>
                    </a>
                </li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <li class="nav-item mt-3">
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger btn-block">
                            <i class="fas fa-sign-out-alt"></i> Sair
                        </button>
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>

    
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </section>
    </div>

    
    <footer class="main-footer text-center">
        <strong>AdminLTE</strong>
    </footer>

</div>


<script src="<?php echo e(asset('adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/dist/js/adminlte.min.js')); ?>"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\Users\vboxuser\reservas-online\app-reservas-on\resources\views/layouts/app.blade.php ENDPATH**/ ?>