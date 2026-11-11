
<?php

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$idade = trim($_POST['idade'] ?? '');
$cidade = trim($_POST['cidade'] ?? '');
$sexo = $_POST['sexo'] ?? '';
$observacoes = trim($_POST['observacoes'] ?? '');

$erros = [];

if ($nome == '') {
    $erros[] = "Digite seu nome.";
}

if ($email == '') {
    $erros[] = "Digite seu e-mail.";
}

if ($idade == '') {
    $erros[] = "Digite sua idade.";
}

if ($cidade == '') {
    $erros[] = "Digite sua cidade.";
}

if ($sexo == '') {
    $erros[] = "Selecione seu sexo.";
}

if ($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = "E-mail inválido.";
}

if ($idade != '') {

    if (!ctype_digit($idade)) {
        $erros[] = "A idade deve ser um número inteiro.";

    } elseif ($idade <= 0) {
        $erros[] = "A idade deve ser maior que zero.";

    } elseif ($idade < 18) {
        $erros[] = "Cadastro permitido apenas para maiores de 18 anos.";
    }
}

if (!in_array($sexo, ['M', 'F', 'Outro'], true)) {
    $erros[] = "Sexo inválido.";
}

// Verificar observações
if (strlen($observacoes) > 2000) {
    $erros[] = "Observações muito longas.";
}

// Mostrar erros
if (!empty($erros)) {

    echo "<h1>Erros encontrados:</h1>";

    foreach ($erros as $erro) {
        echo "<p>" . htmlspecialchars($erro) . "</p>";
    }

    echo "<a href='index.php'>Voltar</a>";
    exit;
}

// Deixar nome e cidade com iniciais maiúsculas
$nome = mb_convert_case(
    mb_strtolower($nome, 'UTF-8'),
    MB_CASE_TITLE,
    'UTF-8'
);

$cidade = mb_convert_case(
    mb_strtolower($cidade, 'UTF-8'),
    MB_CASE_TITLE,
    'UTF-8'
);

// Mostrar resultado
?>

<h1>Cadastro realizado com sucesso!</h1>

<p>Nome: <?= htmlspecialchars($nome) ?></p>
<p>E-mail: <?= htmlspecialchars($email) ?></p>
<p>Idade: <?= htmlspecialchars($idade) ?></p>
<p>Cidade: <?= htmlspecialchars($cidade) ?></p>
<p>Sexo: <?= htmlspecialchars($sexo) ?></p>

<p>Observações:</p>

<p><?= nl2br(htmlspecialchars($observacoes)) ?></p>

<a href="index.php">Voltar</a>
