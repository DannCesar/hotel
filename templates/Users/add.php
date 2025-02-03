<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Realizar reserva/h1>

    <div>
        <span>Preencha os dados do formulário</span>
        <?= $this->Form->create() ?>
        <?= $this->Form->control('name', ['label' => 'Nome:']) ?>
        <?= $this->Form->control('email', ['label' => 'E-mail:']) ?>
        <?= $this->Form->control('password', ['label' => 'Senha:']) ?>
        <?= $this->Form->button('Cadastrar') ?>
        <?= $this->Form->end() ?>
    </div>

</body>

</html>