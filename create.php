<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Adicionar Tarefa</title>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Adicionar Nova Tarefa</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Voltar</a>
            </div>
        </header>
        <!-- Formulário para adicionar nova tarefa -->
        <form action="process.php" method="post">
            <div class="form-container my-4">
                <label for="title">Nome da Tarefa:</label>
                <input class="form-control" type="text" id="title" name="title" placeholder="Nome da Tarefa">
            </div>
            <div class="form-container my-4">
                <label for="description">Descrição da Tarefa:</label>
                <input class="form-control" type="text" id="description" name="description" placeholder="Descrição da Tarefa">
            </div>
            <div class="format-element">
                <input type="submit" class="btn btn-success" name="create" value="Adicionar Tarefa">
            </div>
        </form>
    </div>
</body>
</html>
