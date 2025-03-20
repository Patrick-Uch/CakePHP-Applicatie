<main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
    <script src="https://cdn.tailwindcss.com"></script>
        <h1 class="text-2xl font-semibold text-gray-900">Dossier Overzicht</h1>
    </div>

    <!-- Zoek- en filtersectie -->
    <div class="bg-white rounded-lg shadow mb-6">
        <div class="p-6 flex flex-wrap gap-4 items-center">
            <div class="flex-1 min-w-[300px]">
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Zoek dossiers..."
                        class="w-96 max-w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="flex gap-4">
                <select id="statusFilter" class="w-40 max-w-full border border-gray-300 rounded-lg py-2 pl-3 pr-8 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Alle statussen</option>
                    <option value="Opstarten">Opstarten</option>
                    <option value="Actief">Actief</option>
                    <option value="In beëindiging">In beëindiging</option>
                    <option value="Afgesloten">Afgesloten</option>
                </select>
                <select id="dateFilter" class="w-40 max-w-full border border-gray-300 rounded-lg py-2 pl-3 pr-8 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Alle datums</option>
                    <option value="Vandaag">Vandaag</option>
                    <option value="Deze week">Deze week</option>
                    <option value="Deze maand">Deze maand</option>
                </select>
            </div>
        </div>

        <!-- Tabel met dossiers -->
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
                        <tr class="border dossier-row" data-date="<?= $dossier->gemaakt_op->format('Y-m-d') ?>">
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($dossier->id) ?></td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($dossier->bedrijven->naam ?? 'Geen bedrijf gekoppeld') ?></td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($dossier->naam) ?></td>
                            <td class="border px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    <?= in_array($dossier->status, ['Opstarten', 'Actief']) ? 'bg-green-100 text-green-800' : 
                                    ($dossier->status == 'In beëindiging' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') ?>">
                                    <?= h($dossier->status) ?>
                                </span>
                            </td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($dossier->gemaakt_op->format('d-m-Y')) ?></td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= h($dossier->geupdate_op->timeAgoInWords()) ?></td>
                            <td class="border px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
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
    </div>
</main>

    <script>
    // Filterfunctie voor de dossiertabel
    document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const statusFilter = document.getElementById("statusFilter");
    const dateFilter = document.getElementById("dateFilter");
    const dossierRows = document.querySelectorAll(".dossier-row");

    // Functie om "Laatst gewijzigd" tekst om te zetten naar een datum
    function parseTimeAgo(text) {
        const now = new Date();
        let parsedDate = new Date(now);

        const match = text.match(/(\d+)\s*(minute|hour|second|day|week|month|year)s?/);
        if (match) {
            const amount = parseInt(match[1]);
            const unit = match[2];

            if (unit === "minute") parsedDate.setMinutes(now.getMinutes() - amount);
            if (unit === "hour") parsedDate.setHours(now.getHours() - amount);
            if (unit === "second") parsedDate.setSeconds(now.getSeconds() - amount);
            if (unit === "day") parsedDate.setDate(now.getDate() - amount);
            if (unit === "week") parsedDate.setDate(now.getDate() - amount * 7);
            if (unit === "month") parsedDate.setMonth(now.getMonth() - amount);
            if (unit === "year") parsedDate.setFullYear(now.getFullYear() - amount);
        }

        return parsedDate;
    }

    function filterRows() {
        const searchValue = searchInput.value.toLowerCase();
        const statusValue = statusFilter.value.toLowerCase();
        const dateValue = dateFilter.value;
        const now = new Date();

        // Berekeningen voor datumfilters
        const last24Hours = new Date(now);
        last24Hours.setHours(now.getHours() - 24);

        const weekAgo = new Date(now);
        weekAgo.setDate(now.getDate() - 6);

        const monthAgo = new Date(now);
        monthAgo.setDate(now.getDate() - 29);

        dossierRows.forEach((row) => {
            const bedrijf = row.querySelector("td:nth-child(2)").innerText.toLowerCase();
            const naam = row.querySelector("td:nth-child(3)").innerText.toLowerCase();
            const status = row.querySelector("td:nth-child(4)").innerText.toLowerCase();
            const datumText = row.querySelector("td:nth-child(6)").innerText.toLowerCase();

            let datum = parseTimeAgo(datumText); // Zet tekst om naar een datum

            // Controleer of de rij binnen de geselecteerde periode valt
            let matchesDate = false;
            if (dateValue === "") {
                matchesDate = true; // Geen filter, toon alles
            } else if (dateValue === "Vandaag") {
                matchesDate = datum >= last24Hours && datum <= now;
            } else if (dateValue === "Deze week") {
                matchesDate = datum >= weekAgo && datum <= now;
            } else if (dateValue === "Deze maand") {
                matchesDate = datum >= monthAgo && datum <= now;
            }

            const matchesSearch = bedrijf.includes(searchValue) || naam.includes(searchValue);
            const matchesStatus = status.includes(statusValue) || statusValue === "";

            // Alleen tonen als alle filters overeenkomen
            row.style.display = matchesSearch && matchesStatus && matchesDate ? "" : "none";
        });
    }

    // Event listeners voor de filters
    searchInput.addEventListener("input", filterRows);
    statusFilter.addEventListener("change", filterRows);
    dateFilter.addEventListener("change", filterRows);
    filterRows();
});

</script>
