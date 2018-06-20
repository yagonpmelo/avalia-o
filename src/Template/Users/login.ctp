<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
<fieldset>
<legend><?= __('Login') ?></legend>
<?= $this->Form->control('username',['label' => 'Usuário']) ?>
<?= $this->Form->control('password',['label' => 'Senha']) ?>
</fieldset>
<?= $this->Form->button(__('Logar')); ?>
<?= $this->Form->end() ?>
</div>