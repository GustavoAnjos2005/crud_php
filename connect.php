<?php
// Configurações de conexão com o banco de dados
$hostname = "localhost";   // Endereço do servidor MySQL
$usuario = "root";         // Nome de usuário do MySQL
$senha = "";               // Senha do usuário do MySQL
$bancodedados = "teste_php";  // Nome do banco de dados que você deseja conectar

// Criação de uma nova conexão usando a classe mysqli do PHP
$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

// Verifica se houve algum erro na conexão
if ($mysqli->connect_errno) {
    // Em caso de erro, exibe uma mensagem de falha na conexão com detalhes do erro
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Retorna a conexão $mysqli para ser usada em outros scripts que incluem este arquivo
?>
