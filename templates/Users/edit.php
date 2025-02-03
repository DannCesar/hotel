<h1>Editar Usuário</h1>

<div>
    <span>Atualize os dados do usuário</span>

    <?= $this->Form->create($user) ?>
    <?= $this->Form->control('name', ['label' => 'Nome', 'value' => $user->name ?? '']) ?>
    <?= $this->Form->control('email', ['label' => 'E-mail', 'value' => $user->email ?? '']) ?>
    <?= $this->Form->control('password', ['label' => 'Senha', 'type' => 'password']) ?>
    <?= $this->Form->button('Salvar Alterações') ?>
    <?= $this->Form->end() ?>

</div>