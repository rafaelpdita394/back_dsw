document.addEventListener('DOMContentLoaded', function() {
    // Carregando o Google Charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Função para desenhar o gráfico
    function drawChart() {
        // Verificação se a função está sendo chamada
        console.log('Desenhando gráfico');

        var data = google.visualization.arrayToDataTable([
            ['Aluno', 'Nota'],
            ['Aluno 1', 85],
            ['Aluno 2', 90],
            ['Aluno 3', 75],
            ['Aluno 4', 60],
            ['Aluno 5', 95],
            // Adicione mais alunos e notas aqui
        ]);

        var options = {
            title: 'Notas dos Alunos',
            hAxis: {title: 'Aluno', titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
});

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const role = document.getElementById('role').value;

    if (role === 'instrutor') {
        window.location.href = 'instrutor.html';
    } else if (role === 'aluno') {
        window.location.href = 'aluno.html';
    }
});
