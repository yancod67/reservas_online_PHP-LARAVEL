<div class="container-fluid">

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo e($total); ?></h3>
                    <p>Total de Reservas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo e($pendentes); ?></h3>
                    <p>Pendentes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo e($confirmadas); ?></h3>
                    <p>Confirmadas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo e($canceladas); ?></h3>
                    <p>Canceladas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-times"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3><?php echo e($concluidas); ?></h3>
                    <p>Concluídas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-flag-checkered"></i>
                </div>
            </div>
        </div>

       <div class="row">
    
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Reservas por Status</h3>
            </div>
            <div class="card-body">
                <canvas id="graficoStatus" ></canvas>
            </div>
        </div>
    </div>

    
    <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Distribuição das Reservas</h3>
            </div>
            <div class="card-body">
                <canvas id="graficoDistribuicao"></canvas>

    <script>
document.addEventListener('DOMContentLoaded', function () {

    const statusCtx = document.getElementById('graficoStatus');
    if (statusCtx) {
        new Chart(statusCtx, {
            type: 'bar',
            data: {
                labels: ['Pendente', 'Confirmada', 'Cancelada'],
                datasets: [{
                    label: 'Reservas',
                    data: [
                        <?php echo e($pendentes); ?>,
                        <?php echo e($confirmadas); ?>,
                        <?php echo e($canceladas); ?>

                    ],
                    backgroundColor: ['#ffc107', '#28a745', '#dc3545']
                }]
            }
        });
    }

    const distCtx = document.getElementById('graficoDistribuicao');
    if (distCtx) {
        new Chart(distCtx, {
            type: 'pie',
            data: {
                labels: ['Pendente', 'Confirmada', 'Cancelada'],
                datasets: [{
                    data: [
                        <?php echo e($pendentes); ?>,
                        <?php echo e($confirmadas); ?>,
                        <?php echo e($canceladas); ?>

                    ],
                    backgroundColor: ['#17a2b8', '#28a745', '#dc3545']
                }]
            }
        });
    }
});
</script>

            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('livewire:navigated', () => {

    /* Gráfico de Barras */
    const barCtx = document.getElementById('barChart');
    if (barCtx) {
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Pendente', 'Confirmada', 'Cancelada', 'Concluída'],
                datasets: [{
                    label: 'Total',
                    data: [
                        <?php echo json_encode($pendentes, 15, 512) ?>,
                        <?php echo json_encode($confirmadas, 15, 512) ?>,
                        <?php echo json_encode($canceladas, 15, 512) ?>,
                        <?php echo json_encode($concluidas, 15, 512) ?>
                    ],
                    backgroundColor: [
                        '#ffc107',
                        '#28a745',
                        '#dc3545',
                        '#17a2b8'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }

    /* Gráfico Doughnut */
    const donutCtx = document.getElementById('donutChart');
    if (donutCtx) {
        new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Pendente', 'Confirmada', 'Cancelada', 'Concluída'],
                datasets: [{
                    data: [
                        <?php echo json_encode($pendentes, 15, 512) ?>,
                        <?php echo json_encode($confirmadas, 15, 512) ?>,
                        <?php echo json_encode($canceladas, 15, 512) ?>,
                        <?php echo json_encode($concluidas, 15, 512) ?>
                    ],
                    backgroundColor: [
                        '#ffc107',
                        '#28a745',
                        '#dc3545',
                        '#17a2b8'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }
});
</script>
<?php /**PATH C:\Users\vboxuser\reservas-online\app-reservas-on\resources\views/livewire/dashboard.blade.php ENDPATH**/ ?>