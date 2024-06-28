<?php
include("connect.php");

function cleanInput($data) {
    // Função para limpar entrada de dados
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Adicionar nova tarefa
if (isset($_POST["create"])) {
    $title = cleanInput($_POST["title"]);
    $description = cleanInput($_POST["description"]);

    $sql = "INSERT INTO tasks (title, description) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        session_start();
        $_SESSION["create"] = "Tarefa Cadastrada com Sucesso!";
        header("Location:index.php");
    } else {
        echo "Erro ao executar a query: " . $stmt->error;
    }
    $stmt->close();
}

// Editar uma tarefa existente
if (isset($_POST["edit"])) {
    $title = cleanInput($_POST["title"]);
    $description = cleanInput($_POST["description"]);
    $id = intval($_POST["id"]); // Garantir que $id é um inteiro

    $sql = "UPDATE tasks SET title=?, description=? WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi", $title, $description, $id);

    if ($stmt->execute()) {
        session_start();
        $_SESSION["edit"] = "Tarefa Editada com Sucesso!";
        header("Location:index.php");
    } else {
        echo "Erro ao executar a query: " . $stmt->error;
    }
    $stmt->close();
}

$mysqli->close();
?>
