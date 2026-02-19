<div class="container-fluid">

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total }}</h3>
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
                    <h3>{{ $pendentes }}</h3>
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
                    <h3>{{ $confirmadas }}</h3>
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
                    <h3>{{ $canceladas }}</h3>
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
                    <h3>{{ $concluidas }}</h3>
                    <p>Concluídas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-flag-checkered"></i>
                </div>
            </div>
        </div>

       <div class="row">
    {{-- Gráfico de Barras --}}
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

    {{-- Gráfico Doughnut --}}
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
                        {{ $pendentes }},
                        {{ $confirmadas }},
                        {{ $canceladas }}
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
                        {{ $pendentes }},
                        {{ $confirmadas }},
                        {{ $canceladas }}
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
                        @json($pendentes),
                        @json($confirmadas),
                        @json($canceladas),
                        @json($concluidas)
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
                        @json($pendentes),
                        @json($confirmadas),
                        @json($canceladas),
                        @json($concluidas)
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
