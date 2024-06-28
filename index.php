<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Listagem de Tarefa</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Lista de Tarefas</h1>
        <div>
            <a href="create.php" class="btn btn-primary">Adicionar Nova Tarefa</a>
        </div>
    </header>

    <?php
    // Iniciar a sessão para exibir mensagens
    session_start();

    // Exibir mensagens de sucesso (se existirem)
    function showSuccessMessage($key) {
        if (isset($_SESSION[$key])) {
            echo '<div class="alert alert-success">' . $_SESSION[$key] . '</div>';
            unset($_SESSION[$key]);
        }
    }

    // Mostrar mensagens de sucesso
    showSuccessMessage("create");
    showSuccessMessage("edit");
    showSuccessMessage("delete");
    ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Conectar ao banco de dados
            include("connect.php");
            $sql = "SELECT * FROM tasks";
            $result = mysqli_query($mysqli, $sql);

            // Exibir as tarefas em formato de tabela
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["id"]); ?></td>
                    <td><?php echo htmlspecialchars($row["title"]); ?></td>
                    <td><?php echo htmlspecialchars($row["description"]); ?></td>

                    <td>
                        <a href="view.php?id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-info">Mais Sobre</a>
                        <a href="edit.php?id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta tarefa?')">Deletar</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
