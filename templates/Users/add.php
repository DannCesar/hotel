<h1>Cadastrar Usuário</h1>

<div>
    <span>Preencha os dados do formulário</span>
    <?= $this->Form->create() ?>
    <?= $this->Form->control('name',['label' => 'Nome:'])?>
    <?= $this->Form->control('email',['label'=> 'E-mail:'])?>
    <?= $this->Form->control('password',['label'=> 'Senha:'])?>
    <?= $this->Form->button('Cadastrar')?>
    <?= $this->Form->end() ?>
</div>