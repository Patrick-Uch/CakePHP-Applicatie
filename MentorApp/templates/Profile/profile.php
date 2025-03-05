<div class="p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-lg font-semibold">Profile</h2>

    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700">Bedrijf</label>
        <input type="text" value="<?= h($userEntity->bedrijf ? $userEntity->bedrijf->naam : 'Geen bedrijf gekoppeld') ?>" class="mt-1 p-2 w-full border rounded-lg bg-gray-100" disabled>
    </div>

    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700">Rol</label>
        <input type="text" value="<?= h($userEntity->rol) ?>" class="mt-1 p-2 w-full border rounded-lg bg-gray-100" disabled>
    </div>

    <?= $this->Form->create($userEntity, ['url' => ['action' => 'profile']]) ?>
    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700">Naam</label>
        <?= $this->Form->control('naam', ['label' => false, 'class' => 'mt-1 p-2 w-full border rounded-lg']); ?>
    </div>

    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700">E-mail</label>
        <?= $this->Form->control('email', ['label' => false, 'class' => 'mt-1 p-2 w-full border rounded-lg']); ?>
    </div>

    <?= $this->Form->button(__('Save'), ['class' => 'mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg']); ?>
    <?= $this->Form->end() ?>
</div>

<!-- Password Update -->
<div class="p-6 mt-8 bg-white shadow-md rounded-lg">
    <h2 class="text-lg font-semibold">Update Password</h2>

    <?= $this->Form->create(null, ['url' => ['action' => 'updatePassword']]) ?>
    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700">New Password</label>
        <?= $this->Form->control('new_password', ['type' => 'password', 'label' => false, 'class' => 'mt-1 p-2 w-full border rounded-lg']); ?>
    </div>

    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => false, 'class' => 'mt-1 p-2 w-full border rounded-lg']); ?>
    </div>

    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700">Current Password</label>
        <?= $this->Form->control('current_password', ['type' => 'password', 'label' => false, 'class' => 'mt-1 p-2 w-full border rounded-lg']); ?>
    </div>

    <?= $this->Form->button(__('Update Password'), ['class' => 'mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg']); ?>
    <?= $this->Form->end() ?>
</div>
