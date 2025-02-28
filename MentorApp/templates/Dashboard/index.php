<h1 class="text-2xl font-semibold text-gray-900">Welkom op het Dashboard, <?= h($user->naam) ?>!</h1>

<p>Je bent ingelogd als: <?= h($user->rol) ?></p>

<p>
    <a href="<?= $this->Url->build(['controller' => 'Gebruikers', 'action' => 'logout']) ?>" 
       class="text-red-600 font-bold hover:underline">Uitloggen</a>
</p>
