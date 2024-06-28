<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Detalhes da Tarefa</title>
    <style>
        .task-details {
            background: #f5f5f5;
            padding: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Detalhes da Tarefa</h1>
        <div>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </header> 
    <div class="task-details">
        <?php
            // Verifica se foi enviado um parâmetro 'id' via método GET
            if(isset($_GET["id"])) {
                $id = $_GET["id"];  // Obtém o valor do parâmetro 'id'
                
                // Inclui o arquivo de conexão com o banco de dados
                include("connect.php");
                
                // Prepara a query para selecionar um registro da tabela 'tasks' com base no 'id' recebido
                $sql = "SELECT * FROM tasks WHERE id=$id";
                
                // Executa a query SELECT
                $result = mysqli_query($mysqli, $sql);
                
                // Verifica se há algum resultado retornado pela query
                if(mysqli_num_rows($result) > 0) {
                    // Obtém os dados do registro encontrado
                    $row = mysqli_fetch_array($result);
                    ?>
                    <!-- Exibe os detalhes da tarefa -->
                    <h2>Título</h2>
                    <p><?php echo $row["title"]; ?></p>
                    <h2>Descrição</h2>
                    <p><?php echo $row["description"]; ?></p>
                    <?php
                } else {
                    // Caso não haja registros encontrados, exibe uma mensagem de erro ou aviso
                    echo "Tarefa não encontrada.";
                }
            } else {
                // Caso não tenha sido fornecido um 'id' via GET, exibe uma mensagem de erro ou aviso
                echo "Id da tarefa não encontrado.";
            }
        ?>
    </div>
</div>
</body>
</html>
