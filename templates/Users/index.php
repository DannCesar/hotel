<h1>Listagem de Usuarios</h1>

<div classname="">
    <span>Usuários</span>
    <?php foreach ($users as $user): ?>
        <span><?= ($user->name) ?></span>
    <?php endforeach; ?>
</div>