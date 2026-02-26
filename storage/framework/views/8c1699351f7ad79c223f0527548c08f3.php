

<?php $__env->startSection('title', 'Sistema de Reservas'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">

        
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Nova Reserva</h3>
                </div>

                <form method="POST" action="#">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nome">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label>Data da Reserva</label>
                            <input type="date" class="form-control" name="data">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option>Selecione</option>
                                <option>Ativo</option>
                                <option>Cancelado</option>
                            </select>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>

        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Reservas</h3>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Data</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\vboxuser\reservas-online\app-reservas-on\resources\views/reservas/index.blade.php ENDPATH**/ ?>