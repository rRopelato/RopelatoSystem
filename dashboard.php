<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Dashboard</h1>
            <button onclick="window.location.href='index.php'">Logout</button>
        </div>
        <div class="dashboard-content">
            <div class="dashboard-card">
                <h2>Usuários</h2>
                <p>Total de Usuários: 150</p>
                <p>Usuários Ativos: 120</p>
                <p>Usuários Inativos: 30</p>
            </div>
            <div class="dashboard-card">
                <h2>Vendas</h2>
                <p>Vendas Totais: R$ 25.000</p>
                <p>Vendas Hoje: R$ 1.200</p>
                <p>Produtos Mais Vendidos: Produto A, Produto B</p>
            </div>
            <div class="dashboard-card">
                <h2>Tráfego do Site</h2>
                <p>Visitas Hoje: 1.500</p>
                <p>Visitas Esta Semana: 8.000</p>
                <p>Visitas Este Mês: 32.000</p>
            </div>
            <div class="dashboard-card">
                <h2>Mensagens</h2>
                <p>Mensagens Não Lidas: 5</p>
                <p>Mensagens Lidas: 50</p>
            </div>
        </div>
    </div>
</body>
</html>
