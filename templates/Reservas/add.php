<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Realizar reserva</h1>

    <div>
        <?= $this->Form->create() ?>
        <?= $this->Form->control('datainicial', ['label' => 'Data inicial:','type'=> 'date']) ?>
        <?= $this->Form->control('datafinal', ['label' => 'Data final:','type'=> 'date']) ?>
        <?= $this->Form->button('Reservar') ?>
        <?= $this->Form->end() ?>
    </div>

</body>

</html>