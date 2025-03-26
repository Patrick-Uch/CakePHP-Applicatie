<?php
$this->disableAutoLayout(); // Disable default layout
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <?= $this->Html->css('app') ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Registreren</title>
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center font-sans">
    <div class="max-w-md w-full mx-auto p-8">
        <div class="bg-white rounded-xl shadow-sm p-8">
            <div class="text-center mb-8">
                <img src="<?= $this->Url->build('/uploads/logo.png') ?>" alt="Logo" class="h-12 mx-auto mb-4"/>
                <h2 class="text-2xl font-semibold text-gray-900">Account aanmaken</h2>
                <p class="text-gray-600 mt-2">Vul je gegevens in om te registreren</p>
            </div>

            <?= $this->Form->create($gebruiker) ?>
                <div class="space-y-6">
                    <div>
                        <label for="naam" class="block text-sm font-medium text-gray-700 mb-1">Naam</label>
                        <?= $this->Form->control('naam', [
                            'label' => false,
                            'class' => 'block w-full rounded-lg border border-gray-300 shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500',
                            'placeholder' => 'Voer je naam in'
                        ]) ?>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mailadres</label>
                        <?= $this->Form->control('email', [
                            'label' => false,
                            'class' => 'block w-full rounded-lg border border-gray-300 shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500',
                            'placeholder' => 'Voer je e-mailadres in'
                        ]) ?>
                    </div>

                    <div>
                        <label for="wachtwoord" class="block text-sm font-medium text-gray-700 mb-1">Wachtwoord</label>
                        <?= $this->Form->control('wachtwoord', [
                            'type' => 'password',
                            'label' => false,
                            'class' => 'block w-full rounded-lg border border-gray-300 shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500',
                            'placeholder' => 'Kies een wachtwoord'
                        ]) ?>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white rounded-lg py-2.5 font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Registreren
                    </button>
                </div>
            <?= $this->Form->end() ?>

            <p class="mt-6 text-center text-sm text-gray-600">
                Heb je al een account?
                <?= $this->Html->link('Inloggen', ['action' => 'login'], ['class' => 'font-medium text-blue-600 hover:underline']) ?>
            </p>
        </div>
    </div>
</body>
</html>
