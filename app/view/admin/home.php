<?php require_once "app/view/comuns/cabecalho.php" ?>

    <div class="container">
        
        <div class="row mt-5">
            <!-- Gráfico de Barras -->
            <div class="col-lg-12 mb-4">
                <div class="chart-container">
                    <h3 class="chart-title">Vendas Mensais</h3>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            
            <!-- Gráfico de Rosquinha (Doughnut) -->
            <div class="col-lg-6 mb-4">
                <div class="chart-container">
                    <h3 class="chart-title">Vendas por Departamento</h3>
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
            
            <!-- Gráfico de Pizza (Pie) -->
            <div class="col-lg-6 mb-4">
                <div class="chart-container">
                    <h3 class="chart-title">Estoque por departamento</h3>
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            // Método simples sem biblioteca
            const link = document.createElement('link');
            link.id = 'graficos-css';
            link.rel = 'stylesheet';
            link.href = window.location.origin + '/assets/css/graficos.css';
            
            link.onload = () => console.log('✅ CSS carregado!');
            link.onerror = () => console.error('❌ Erro ao carregar CSS');
            
            document.head.appendChild(link);
        });

        // Configuração do Gráfico de Barras
        const barCtx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
                datasets: [{
                    label: 'Vendas (R$ mil)',
                    data: [65, 59, 45, 81, 30, 95],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    title: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'R$ ' + value + '';
                            }
                        }
                    }
                }
            }
        });
        
        // Configuração do Gráfico de Rosquinha (Doughnut)
        const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
        const doughnutChart = new Chart(doughnutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Eletrônicos', 'Roupas', 'Alimentos', 'Livros', 'Outros'],
                datasets: [{
                    label: 'Quantidade',
                    data: [300, 150, 200, 100, 80],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed + ' unidades';
                                return label;
                            }
                        }
                    }
                }
            }
        });
        
        // Configuração do Gráfico de Pizza (Pie)
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Eletrônicos', 'Roupas', 'Alimentos', 'Livros', 'Outros'],
                datasets: [{
                    label: 'Participação (%)',
                    data: [35, 25, 20, 12, 8],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed + '%';
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>

<?php require_once "app/view/comuns/rodape.php" ?>