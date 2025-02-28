<h1>Registreren</h1>
<?= $this->Form->create($gebruiker) ?>
<?= $this->Form->control('naam', ['label' => 'Naam']) ?>
<?= $this->Form->control('email', ['label' => 'E-mailadres']) ?>
<?= $this->Form->control('wachtwoord', ['type' => 'password', 'label' => 'Wachtwoord']) ?>
<?= $this->Form->button('Registreren') ?>
<?= $this->Form->end() ?>
<p>Heb je al een account? <?= $this->Html->link('Inloggen', ['action' => 'login']) ?></p>
