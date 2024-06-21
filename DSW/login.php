<?php
// Verifica se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de usuário e senha foram enviados
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["role"])) {
        // Conecta ao banco de dados MySQL (substitua com suas próprias credenciais)
        $conn = new mysqli("localhost", "root", "", "dsw");

        // Verifica se a conexão foi estabelecida com sucesso
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        // Limpa e armazena os valores dos campos de login
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $role = mysqli_real_escape_string($conn, $_POST["role"]);

        // Consulta SQL para verificar as credenciais do usuário
        $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password' AND role='$role'";
        
        $result = $conn->query($sql);

        // Verifica se há erros na execução da consulta SQL
        if (!$result) {
            echo "Erro na consulta SQL: " . $conn->error;
        } else {
            // Verifica se o usuário foi encontrado no banco de dados
            if ($result->num_rows > 0) {
                // Redireciona o usuário para a página correta com base no papel (role)
                if ($role === 'instrutor') {
                    header("Location: instrutor.html");
                    exit();
                } else if ($role === 'aluno') {
                    header("Location: aluno.html");
                    exit();
                }
            } else {
                echo "Credenciais de login inválidas.";
            }
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
}
?>
