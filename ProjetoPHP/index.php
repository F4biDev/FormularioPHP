<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="container">
    
    <h1>Cadastro de Cliente</h1>

    <form action="processa.php" method="POST">

        <label>Nome completo:</label>
        <input type="text" name="nome" required>

        <label>E-mail:</label>
        <input type="email" name="email" required>

        <label>Idade:</label>
        <input type="text" name="idade" required>

        <label>Cidade:</label>
        <input type="text" name="cidade" required>

        <label>Sexo:</label>

        <input type="radio" name="sexo" value="M" required> Masculino
        <input type="radio" name="sexo" value="F"> Feminino
        <input type="radio" name="sexo" value="Outro"> Outro

        <label>Observações:</label>
        <textarea name="observacoes"></textarea>

        <button type="submit">Enviar Dados</button>

    </form>

</div>

</body>
</html>
