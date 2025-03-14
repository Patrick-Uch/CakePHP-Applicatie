<div class="flex justify-center">
    <div class="w-full max-w-xl p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-lg font-semibold">Profiel</h2>

        <!-- Weergave van het gekoppelde bedrijf -->
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Bedrijf</label>
            <input type="text" value="<?= h($userEntity->bedrijven->naam ?? 'Geen bedrijf gekoppeld') ?>" 
                   class="mt-1 p-2 w-full border rounded-lg bg-gray-100" disabled>
        </div>

        <!-- Weergave van de gebruikersrol -->
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Rol</label>
            <input type="text" value="<?= h($userEntity->rol) ?>" 
                   class="mt-1 p-2 w-full border rounded-lg bg-gray-100" disabled>
        </div>

        <!-- Formulier om profielgegevens bij te werken -->
        <?= $this->Form->create($userEntity, ['url' => ['action' => 'profile'], 'class' => 'space-y-4']) ?>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Naam</label>
            <?= $this->Form->control('naam', ['label' => false, 'class' => 'mt-1 p-2 w-full border rounded-lg']); ?>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">E-mail</label>
            <?= $this->Form->control('email', ['label' => false, 'class' => 'mt-1 p-2 w-full border rounded-lg']); ?>
        </div>

        <?= $this->Form->button(__('Opslaan'), ['class' => 'mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg w-full']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<!-- Wachtwoord bijwerken -->
<div class="flex justify-center">
    <div class="w-full max-w-xl p-6 mt-8 bg-white shadow-md rounded-lg">
        <h2 class="text-lg font-semibold">Wachtwoord bijwerken</h2>

        <?= $this->Form->create(null, ['url' => ['action' => 'updatePassword'], 'class' => 'space-y-4']) ?>

        <div>
            <label class="block text-sm font-medium text-gray-700">Nieuw wachtwoord</label>
            <?= $this->Form->control('new_password', ['type' => 'password', 'label' => false, 'class' => 'mt-1 p-2 w-full border rounded-lg']); ?>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Bevestig wachtwoord</label>
            <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => false, 'class' => 'mt-1 p-2 w-full border rounded-lg']); ?>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Huidig wachtwoord</label>
            <?= $this->Form->control('current_password', ['type' => 'password', 'label' => false, 'class' => 'mt-1 p-2 w-full border rounded-lg']); ?>
        </div>

        <?= $this->Form->button(__('Wachtwoord bijwerken'), ['class' => 'mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg w-full']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
