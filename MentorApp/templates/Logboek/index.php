<main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow mb-6">
        <div class="p-6 flex flex-wrap gap-4 items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Logboek</h1>
        </div>

        <!-- Filters -->
        <form method="get" class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
            <!-- Tijd filter -->
            <select name="time" class="border p-2 rounded-lg bg-gray-100 focus:ring focus:ring-blue-200">
                <option value="" <?= !$this->request->getQuery('time') ? 'selected' : '' ?>>Alle tijd</option>
                <option value="1d" <?= $this->request->getQuery('time') === '1d' ? 'selected' : '' ?>>Laatste 24 uur</option>
                <option value="7d" <?= $this->request->getQuery('time') === '7d' ? 'selected' : '' ?>>Laatste 7 dagen</option>
                <option value="1m" <?= $this->request->getQuery('time') === '1m' ? 'selected' : '' ?>>Laatste maand</option>
            </select>

            <!-- Dossier filter -->
            <select name="dossier" class="border p-2 rounded-lg bg-gray-100 focus:ring focus:ring-blue-200">
                <option value="" <?= !$this->request->getQuery('dossier') ? 'selected' : '' ?>>Alle dossiers</option>
                <?php foreach ($dossiers as $dossier): ?>
                    <option value="<?= h($dossier->id) ?>" <?= $this->request->getQuery('dossier') == $dossier->id ? 'selected' : '' ?>>
                        <?= h($dossier->naam ?? 'Onbekend') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Gebruiker filter -->
            <select name="gebruiker" class="border p-2 rounded-lg bg-gray-100 focus:ring focus:ring-blue-200">
                <option value="" <?= !$this->request->getQuery('gebruiker') ? 'selected' : '' ?>>Alle gebruikers</option>
                <?php foreach ($gebruikers as $gebruiker): ?>
                    <option value="<?= h($gebruiker->id) ?>" <?= $this->request->getQuery('gebruiker') == $gebruiker->id ? 'selected' : '' ?>>
                        <?= h($gebruiker->naam ?? 'Onbekend') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Actie filter -->
            <select name="actie" class="border p-2 rounded-lg bg-gray-100 focus:ring focus:ring-blue-200">
                <option value="" <?= !$this->request->getQuery('actie') ? 'selected' : '' ?>>Alle acties</option>
                <option value="Created" <?= $this->request->getQuery('actie') === 'Created' ? 'selected' : '' ?>>Aangemaakt</option>
                <option value="Updated" <?= $this->request->getQuery('actie') === 'Updated' ? 'selected' : '' ?>>Bijgewerkt</option>
                <option value="Deleted" <?= $this->request->getQuery('actie') === 'Deleted' ? 'selected' : '' ?>>Verwijderd</option>
            </select>

            <!-- Filter Button -->
            <button type="submit" class="px-5 py-2 text-white bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg hover:from-blue-600 hover:to-blue-800 shadow-md transition">
                <i class="fas fa-filter mr-2"></i> Filter toepassen
            </button>
        </form>

        <!-- Log Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tijdstip</th>
                        <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dossier</th>
                        <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gebruiker</th>
                        <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actie</th>
                        <th class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Beschrijving</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($logboek as $log): ?>
                        <tr class="border hover:bg-gray-50">
                            <td class="border px-6 py-4 text-sm text-gray-500"><?= h($log->gemaakt_op->format('Y-m-d H:i')) ?></td>
                            <td class="border px-6 py-4 text-sm text-gray-500"><?= h($log->dossier_id ?? 'Onbekend') ?></td>
                            <td class="border px-6 py-4 text-sm text-gray-500"><?= h($log->gebruiker->naam ?? 'Onbekend') ?></td>
                            <td class="border px-6 py-4 text-sm">
                                <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full 
                                    <?= $log->actie === 'Created' ? 'bg-blue-100 text-blue-800' : 
                                    ($log->actie === 'Updated' ? 'bg-yellow-100 text-yellow-800' : 
                                    ($log->actie === 'Deleted' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800')) ?>">
                                    <?= h($log->actie) ?>
                                </span>
                            </td>
                            <td class="border px-6 py-4 text-sm text-gray-600"><?= h($log->beschrijving) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-4 px-6 mb-[10px]">
            <div class="text-sm text-gray-700">
                Weergave van <span class="font-medium"><?= $this->Paginator->counter('{{start}}') ?></span> 
                tot <span class="font-medium"><?= $this->Paginator->counter('{{end}}') ?></span> 
                van <span class="font-medium"><?= $this->Paginator->counter('{{count}}') ?></span> resultaten
            </div>
            <div class="flex space-x-2 mb-[10px]">
                <?= $this->Paginator->prev('← Vorige') ?>
                <?= $this->Paginator->next('Volgende →') ?>
            </div>
        </div>
    </div>
</main>
