<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?php echo e($title ?? config('app.name')); ?></title>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/dist/css/adminlte.min.css')); ?>">
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <b>Reservas</b>Online
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <?php echo e($slot); ?>

        </div>
    </div>
</div>

<script src="<?php echo e(asset('adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/dist/js/adminlte.min.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\Users\vboxuser\reservas-online\app-reservas-on\resources\views/components/layouts/auth/simple.blade.php ENDPATH**/ ?>