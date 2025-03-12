<main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-9">
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <!-- Zoek- en filtersectie -->
                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" placeholder="Zoek in logboek..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-custom focus:border-custom"/>
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <!-- Filter op actie -->
                        <select class="border border-gray-300 rounded-lg py-2 px-4 focus:ring-custom focus:border-custom">
                            <option>Alle acties</option>
                            <option>Login</option>
                            <option>Logout</option>
                            <option>Aangemaakt</option>
                            <option>Bewerkt</option>
                            <option>Verwijderd</option>
                        </select>
                        <!-- Filter op status -->
                        <select class="border border-gray-300 rounded-lg py-2 px-4 focus:ring-custom focus:border-custom">
                            <option>Alle statussen</option>
                            <option>Succes</option>
                            <option>Mislukt</option>
                            <option>In afwachting</option>
                        </select>
                        <!-- Datumfilter knop -->
                        <button class="!rounded-button bg-custom text-white px-4 py-2 hover:bg-custom/90">
                            <i class="fas fa-calendar-alt mr-2"></i>Datumfilter
                        </button>
                    </div>
                </div>

                <!-- Export en paginagrootte-opties -->
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center gap-4">
                        <button class="!rounded-button border border-gray-300 px-4 py-2 hover:bg-gray-50">
                            <i class="fas fa-file-export mr-2"></i>Exporteer
                        </button>
                        <select class="border border-gray-300 rounded-lg py-2 px-4 focus:ring-custom focus:border-custom">
                            <option>10 resultaten</option>
                            <option>25 resultaten</option>
                            <option>50 resultaten</option>
                            <option>100 resultaten</option>
                        </select>
                    </div>
                </div>

                <!-- Logboek tabel -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tijdstip<i class="fas fa-sort ml-2"></i></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gebruiker<i class="fas fa-sort ml-2"></i></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actie<i class="fas fa-sort ml-2"></i></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Beschrijving</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP-adres</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($logboek as $log): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($log->timestamp) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($log->gebruiker->naam) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($log->action) ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?= h($log->description) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($log->ip_address) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"><?= h($log->status) ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Paginering -->
                <div class="flex items-center justify-between mt-4">
                    <div class="text-sm text-gray-700">
                        Weergave van <span class="font-medium">0</span> tot <span class="font-medium">0</span> van <span class="font-medium"><?= count($logboek) ?></span> resultaten
                    </div>
                    <div class="flex gap-2">
                        <?= $this->Paginator->prev('Vorige', ['class' => '!rounded-button border border-gray-300 px-4 py-2 hover:bg-gray-50 disabled:opacity-50']) ?>
                        <?= $this->Paginator->next('Volgende', ['class' => '!rounded-button border border-gray-300 px-4 py-2 hover:bg-gray-50']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
