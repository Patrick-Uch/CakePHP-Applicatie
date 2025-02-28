<h1>Inloggen</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email', ['label' => 'E-mail']) ?>
<?= $this->Form->control('wachtwoord', ['type' => 'password', 'label' => 'Wachtwoord']) ?>
<?= $this->Form->button('Inloggen') ?>
<?= $this->Form->end() ?>
<p>Nog geen account? <?= $this->Html->link('Registreren', ['action' => 'register']) ?></p>