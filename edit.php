<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Editar Tarefa</title>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Editar a Tarefa</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Voltar</a>
            </div>
        </header>
        <?php
            // Verifica se foi enviado um parâmetro 'id' via método GET
            if (isset($_GET["id"])) {
                $id = $_GET["id"];  // Obtém o valor do parâmetro 'id'
                
                // Inclui o arquivo de conexão com o banco de dados
                include("connect.php");
                
                // Prepara a query para selecionar um registro da tabela 'tasks' com base no 'id' recebido
                $sql = "SELECT * FROM tasks WHERE id=$id";
                
                // Executa a query SELECT
                $result = mysqli_query($mysqli, $sql);
                
                // Obtém os dados do registro encontrado
                $row = mysqli_fetch_array($result);
        ?>
        <!-- Formulário para editar a tarefa -->
        <form action="process.php" method="post">
            <div class="form-element my-4">
                <!-- Input oculto para enviar o 'id' junto com os dados editados -->
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="title">Nome da Tarefa:</label>
                <!-- Campo de texto preenchido com o título da tarefa atual -->
                <input class="form-control" type="text" id="title" name="title" value="<?php echo $row["title"]; ?>" placeholder="Nome da Tarefa">
            </div>
            <div class="form-element my-4">
                <label for="description">Descrição da Tarefa:</label>
                <!-- Campo de texto preenchido com a descrição da tarefa atual -->
                <input class="form-control" type="text" id="description" name="description" value="<?php echo $row["description"]; ?>" placeholder="Descrição da Tarefa">
            </div>
            <div class="format-element">
                <input type="submit" class="btn btn-success" name="edit" value="Editar Tarefa">
            </div>
        </form>
        <?php
            }
        ?>
    </div>
</body>
</html>
