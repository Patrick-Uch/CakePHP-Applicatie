<div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-gray-900">Dossier Overzicht</h1>
    </div>

    <div class="bg-white rounded-lg shadow mb-6">
        <div class="p-6 flex flex-wrap gap-4 items-center">
            <div class="flex-1 min-w-[300px]">
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Zoek dossiers..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>

            <div class="flex gap-4">
                <select id="statusFilter" class="border border-gray-300 rounded-lg py-2 pl-3 pr-8 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Alle statussen</option>
                    <option value="Opstarten">Opstarten</option>
                    <option value="Actief">Actief</option>
                    <option value="In beëindiging">In beëindiging</option>
                    <option value="Afgesloten">Afgesloten</option>
                </select>
                <select id="dateFilter" class="border border-gray-300 rounded-lg py-2 pl-3 pr-8 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Alle datums</option>
                    <option value="Vandaag">Vandaag</option>
                    <option value="Deze week">Deze week</option>
                    <option value="Deze maand">Deze maand</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" id="dossiersTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dossiernummer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bedrijf</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Naam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Datum</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Laatst gewijzigd</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acties</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="dossierRows">
                    <?php foreach ($dossiers as $dossier): ?>
                        <tr class="dossier-row">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= h($dossier->id) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($dossier->bedrijven->naam ?? 'Geen bedrijf gekoppeld') ?></td>


                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($dossier->naam) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                <?= $dossier->status == 'Actief' ? 'bg-green-100 text-green-800' : 
                                ($dossier->status == 'Afgesloten' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') ?>">
                                    <?= h($dossier->status) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($dossier->gemaakt_op->format('d-m-Y')) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($dossier->geupdate_op->timeAgoInWords()) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="<?= $this->Url->build(['controller' => 'Dossiers', 'action' => 'edit', $dossier->id]) ?>" class="text-blue-600 hover:text-blue-900 mr-3">
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
        </div>
    </div>

<div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200">
    <div class="flex items-center space-x-2">
        <?= $this->Paginator->prev('« Vorige', ['class' => 'px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500']) ?>
        <?= $this->Paginator->numbers(['class' => 'px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500']) ?>
        <?= $this->Paginator->next('Volgende »', ['class' => 'px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500']) ?>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const dateFilter = document.getElementById('dateFilter');
        const dossiersTable = document.getElementById('dossiersTable');
        const dossierRows = document.querySelectorAll('.dossier-row');

        function filterRows() {
            const searchValue = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value.toLowerCase();
            const dateValue = dateFilter.value.toLowerCase();

            dossierRows.forEach(row => {
                const bedrijf = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
                const naam = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
                const status = row.querySelector('td:nth-child(4)').innerText.toLowerCase();
                const datum = row.querySelector('td:nth-child(5)').innerText.toLowerCase();
                const matchesSearch = bedrijf.includes(searchValue) || naam.includes(searchValue);
                const matchesStatus = status.includes(statusValue) || statusValue === '';
                const matchesDate = datum.includes(dateValue) || dateValue === '';

                if (matchesSearch && matchesStatus && matchesDate) {
                    row.style.display = ''; 
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', filterRows);
        statusFilter.addEventListener('change', filterRows);
        dateFilter.addEventListener('change', filterRows);

        filterRows();
    });
</script>
