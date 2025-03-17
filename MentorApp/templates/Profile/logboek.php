<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg shadow-md">
                    <thead class="bg-gray-100">
                        <tr class="text-gray-600 text-sm uppercase">
                        <th class="px-6 py-3 text-left font-semibold">Tijdstip</th>
                        <th class="px-6 py-3 text-left font-semibold">Dossier</th>
                        <th class="px-6 py-3 text-left font-semibold">Gebruiker</th>
                        <th class="px-6 py-3 text-left font-semibold">Actie</th>
                        <th class="px-6 py-3 text-left font-semibold">Beschrijving</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (!empty($logboek)) : ?>
                        <?php foreach ($logboek as $log): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700"><?= h($log->gemaakt_op) ?></td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <?= isset($log->dossier_id) ? h($log->dossier_id) : '<span class="text-gray-400 italic">Onbekend</span>' ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <?= isset($log->gebruiker->naam) ? h($log->gebruiker->naam) : '<span class="text-gray-400 italic">Onbekend</span>' ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                        <?= $log->actie === 'Created' ? 'bg-blue-100 text-blue-800' : 
                                            ($log->actie === 'Updated' ? 'bg-yellow-100 text-yellow-800' : 
                                            ($log->actie === 'Deleted' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800')) ?>">
                                        <?= h($log->actie) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600"><?= h($log->beschrijving) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 italic">Geen logs gevonden</td>
                        </tr>
                        <?php endif; ?>
                        </tbody>

                    </table>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div class="text-sm text-gray-700">
                        Weergave van <span class="font-medium"><?= count($logboek) ? 1 : 0 ?></span> tot <span class="font-medium"><?= count($logboek) ?></span> van <span class="font-medium"><?= count($logboek) ?></span> resultaten
                    </div>
                    <div class="flex gap-2">
                        <?= $this->Paginator->prev('Vorige', ['class' => 'border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-100 disabled:opacity-50']) ?>
                        <?= $this->Paginator->next('Volgende', ['class' => 'border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-100']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
