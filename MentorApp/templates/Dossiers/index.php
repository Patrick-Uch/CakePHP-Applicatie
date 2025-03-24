<main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-gray-900">Dossier Overzicht</h1>
    </div>

    <!-- Filters -->
    <form method="get" class="p-6 flex flex-wrap gap-4 items-center bg-white rounded-lg shadow mb-6">
        <input type="text" name="search" value="<?= h($this->request->getQuery('search')) ?>"
            placeholder="Zoek dossiers..."
            class="w-96 max-w-full pl-4 pr-4 py-2 border border-gray-300 rounded-lg bg-gray-100 focus:ring-blue-500">

        <select name="status"
            class="w-40 max-w-full border border-gray-300 rounded-lg py-2 pl-3 pr-8 bg-gray-100 focus:ring-blue-500">
            <option value="">Alle statussen</option>
            <?php foreach (['Opstarten', 'Actief', 'In beëindiging', 'Afgesloten'] as $option): ?>
                <option value="<?= $option ?>" <?= $this->request->getQuery('status') === $option ? 'selected' : '' ?>>
                    <?= $option ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select name="date"
            class="w-40 max-w-full border border-gray-300 rounded-lg py-2 pl-3 pr-8 bg-gray-100 focus:ring-blue-500">
            <option value="">Alle datums</option>
            <?php foreach (['Vandaag', 'Deze week', 'Deze maand'] as $option): ?>
                <option value="<?= $option ?>" <?= $this->request->getQuery('date') === $option ? 'selected' : '' ?>>
                    <?= $option ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Filter toepassen -->
        <button type="submit"
            class="px-5 py-2 text-white bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg hover:from-blue-600 hover:to-blue-800 shadow-md transition">
            <i class="fas fa-filter mr-2"></i> Filter toepassen
        </button>

        <!-- Reset filters -->
        <a href="<?= $this->Url->build(['controller' => 'Dossiers', 'action' => 'index']) ?>"
            class="px-5 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg shadow-md transition inline-flex items-center">
            <i class="fas fa-times mr-2"></i> Reset filters
        </a>
    </form>

    <!-- Dossier Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dossiernummer</th>
                    <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bedrijf</th>
                    <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Naam</th>
                    <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Datum</th>
                    <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Laatst gewijzigd</th>
                    <th class="border px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acties</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($dossiers as $dossier): ?>
                    <tr class="border">
                        <td class="border px-6 py-4 text-sm text-gray-500"><?= h($dossier->id) ?></td>
                        <td class="border px-6 py-4 text-sm text-gray-500"><?= h($dossier->bedrijven->naam ?? 'Geen bedrijf gekoppeld') ?></td>
                        <td class="border px-6 py-4 text-sm text-gray-500"><?= h($dossier->naam) ?></td>
                        <td class="border px-6 py-4">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                <?= in_array($dossier->status, ['Opstarten', 'Actief']) ? 'bg-green-100 text-green-800' :
                                    ($dossier->status == 'In beëindiging' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') ?>">
                                <?= h($dossier->status) ?>
                            </span>
                        </td>
                        <td class="border px-6 py-4 text-sm text-gray-500"><?= h($dossier->gemaakt_op->format('d-m-Y')) ?></td>
                        <td class="border px-6 py-4 text-sm text-gray-500"><?= h($dossier->geupdate_op->timeAgoInWords()) ?></td>
                        <td class="border px-6 py-4 text-right text-sm font-medium">
                            <a href="<?= $this->Url->build(['controller' => 'Dossiers', 'action' => 'view', $dossier->id]) ?>"
                                class="text-green-600 hover:text-green-900 mr-3">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?= $this->Url->build(['controller' => 'Dossiers', 'action' => 'edit', $dossier->id]) ?>"
                                class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <?= $this->Form->postLink(
                                '<i class="fas fa-trash"></i>',
                                ['controller' => 'Dossiers', 'action' => 'delete', $dossier->id],
                                ['confirm' => 'Weet je zeker dat je dit dossier wilt verwijderen?', 'escape' => false, 'class' => 'text-red-600 hover:text-red-900']
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-4 px-6 mb-[10px]">
            <div class="text-sm text-gray-700">
                Weergave van <span class="font-medium"><?= $this->Paginator->counter('{{start}}') ?></span> 
                tot <span class="font-medium"><?= $this->Paginator->counter('{{end}}') ?></span> 
                van <span class="font-medium"><?= $this->Paginator->counter('{{count}}') ?></span> resultaten
            </div>
            <div class="flex space-x-2">
                <?= $this->Paginator->prev('← Vorige', [
                    'class' => 'px-4 py-2 rounded-lg border border-gray-300 text-gray-600 bg-white hover:bg-gray-200 transition disabled:opacity-50 disabled:cursor-not-allowed',
                    'disabled' => !$this->Paginator->hasPrev()
                ]) ?>
                <?= $this->Paginator->next('Volgende →', [
                    'class' => 'px-4 py-2 rounded-lg border border-gray-300 text-gray-600 bg-white hover:bg-gray-200 transition disabled:opacity-50 disabled:cursor-not-allowed',
                    'disabled' => !$this->Paginator->hasNext()
                ]) ?>
            </div>
        </div>
    </div>
</main>
