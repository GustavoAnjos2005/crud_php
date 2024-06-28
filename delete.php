<?php
if (isset($_GET["id"])) {
    $id = intval($_GET["id"]); // Garantir que $id é um inteiro
    include("connect.php");
    $sql = "DELETE FROM tasks WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        // Se a query DELETE for executada com sucesso:
        session_start();
        $_SESSION["delete"] = "Tarefa Deletada com Sucesso!"; // Define uma mensagem de sucesso na sessão
        header("Location:index.php");
    } else {
         // Em caso de erro na execução da query DELETE, exibe a mensagem de erro
        echo "Erro ao executar a query: " . $stmt->error;
    }
    $stmt->close();
    $mysqli->close();
}
?>
