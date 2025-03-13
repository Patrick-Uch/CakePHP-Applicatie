<main class="max-w-8xl mx-auto px-6 sm:px-10 lg:px-16 py-8">
    <!-- Koptekst en knop om te verversen -->
    <div class="mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between">
        <div>
            <h1 class="text-3xl font-semibold text-gray-900">Recente Documentactiviteiten</h1>
            <p class="mt-2 text-gray-600 text-sm">Houd alle documentupdates in realtime bij.</p>
        </div>
        <button class="!rounded-lg flex items-center px-5 py-2 bg-blue-600 text-white font-medium shadow hover:bg-blue-700 transition">
            <i class="fas fa-sync-alt mr-2"></i> Verversen
        </button>
    </div>

    <!-- Filteropties en lay-outinstellingen -->
    <div class="bg-white rounded-xl shadow-lg mb-6 p-6">
        <div class="pb-4 border-b border-gray-200 flex flex-wrap gap-4 items-center">
            <select class="!rounded-lg w-44 px-3 py-2 border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                <option>Vandaag</option>
                <option>Deze Week</option>
                <option>Deze Maand</option>
            </select>
            <select class="!rounded-lg w-44 px-3 py-2 border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                <option>Alle Types</option>
                <option>PDF</option>
                <option>Word</option>
                <option>Excel</option>
            </select>
            <div class="flex-grow"></div>
            <div class="flex items-center space-x-2">
                <button class="!rounded-lg p-2 hover:bg-gray-100"><i class="fas fa-th-list text-gray-400"></i></button>
                <button class="!rounded-lg p-2 hover:bg-gray-100"><i class="fas fa-th-large text-gray-400"></i></button>
            </div>
        </div>

        <!-- Info over recente activiteit -->
        <div class="mt-4 bg-gray-50 px-4 py-3 rounded-lg shadow">
            <p class="text-gray-700 text-sm">
                <span class="font-semibold text-blue-600">0</span> nieuwe documenten toegevoegd in de laatste 24 uur door 
                <span class="font-semibold text-blue-600">0</span> gebruikers.
            </p>
        </div>

        <!-- Lijst met documenten -->
        <ul class="divide-y divide-gray-200 mt-4">
            <?php
            // Hier kunnen dynamische documentgegevens worden geladen
            $documents = [];

            foreach ($documents as $doc): ?>
            <li class="hover:bg-gray-50 transition">
                <div class="px-6 py-4 flex items-center">
                    <div class="flex-shrink-0">
                        <i class="far <?= $doc['icon'] ?> <?= $doc['color'] ?> text-3xl"></i>
                    </div>
                    <div class="min-w-0 flex-1 px-6">
                        <h3 class="text-lg font-medium text-gray-900"><?= $doc['title'] ?></h3>
                        <p class="text-sm text-gray-500"><?= $doc['path'] ?></p>
                    </div>
                    <div class="ml-6 text-sm text-gray-500">
                        <i class="far fa-clock mr-1"></i> <?= $doc['time'] ?>
                    </div>
                    <div class="ml-6 flex items-center space-x-2">
                        <button class="!rounded-lg p-2 hover:bg-gray-100"><i class="fas fa-external-link-alt text-gray-400"></i></button>
                        <button class="!rounded-lg p-2 hover:bg-gray-100"><i class="fas fa-share text-gray-400"></i></button>
                        <button class="!rounded-lg p-2 hover:bg-gray-100"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</main>
