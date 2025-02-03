<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= $this->Html->css('users') ?>
</head>

<body>
    <div class="geralContainer">

        <h1>Listagem de Usuarios</h1>

        <div class="listContainer">
            <h4>Usuários</h4>
            <?php foreach ($users as $user): ?>
                <div class="userContainer">
                    <span><?= ($user->name) ?></span>
                    <div class="buttonContainer">
                    <?= $this->Html->link('Editar', ['controller' => 'Users', 'action' => 'edit', $user->id], ['class' => 'btn btn-edit']) ?>
                    <?= $this->Form->postLink(' Deletar', ['action' => 'delete', $user->id], [
                        'confirm' => 'Tem certeza que deseja excluir este usuário?',
                        'class' => 'btn btn-delete'
                        ]) ?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
</body>
</div>

</html>