<main class="max-w-8xl mx-auto px-4 py-8">
    <div class="grid grid-cols-12 gap-6">

        <!-- Linker sectie: Overzicht & Dossiers -->
        <div class="col-span-12 lg:col-span-8">
            <!-- Overzicht met statistieken -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold">Overzicht</h2>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        <i class="fas fa-plus mr-2"></i>Nieuw Dossier
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-500">Actieve Dossiers</p>
                        <h3 class="text-2xl font-bold"><?= $actieveDossiers ?? '0' ?></h3>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-500">Open Taken</p>
                        <h3 class="text-2xl font-bold"><?= $openTaken ?? '0' ?></h3>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-500">Nieuwe Herinneringen</p>
                        <h3 class="text-2xl font-bold"><?= $nieuweHerinneringen ?? '0' ?></h3>
                    </div>
                </div>
            </div>

            <!-- Laatst bijgewerkte dossiers -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold">Laatst bijgewerkte dossiers</h2>
                    <button class="text-blue-600 hover:text-blue-800">
                        Alles bekijken <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <?php if (!empty($recentDossiers)): ?>
                        <?php foreach ($recentDossiers as $dossier): ?>
                            <div class="border rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-medium"><?= h($dossier->naam) ?></h3>
                                        <p class="text-sm text-gray-500">Bijgewerkt op <?= h($dossier->geupdate_op->format('d-m-Y')) ?></p>
                                    </div>
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded"><?= h($dossier->status) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-gray-500 text-sm">Geen recente dossiers beschikbaar.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Rechter sectie: Herinneringen, Taken, Logboek -->
        <div class="col-span-12 lg:col-span-4">
            <!-- Herinneringen -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-xl font-semibold mb-6">Herinneringen</h2>
                <div class="space-y-4">
                    <?php if (!empty($herinneringen)): ?>
                        <?php foreach ($herinneringen as $herinnering): ?>
                            <div class="flex items-start gap-4">
                                <div class="bg-yellow-100 rounded-full p-2">
                                    <i class="fas fa-bell text-yellow-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-medium"><?= h($herinnering->titel) ?></h3>
                                    <p class="text-sm text-gray-500"><?= h($herinnering->datum->format('d-m-Y H:i')) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-gray-500 text-sm">Geen herinneringen beschikbaar.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Open Taken -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-xl font-semibold mb-6">Open Taken</h2>
                <div class="space-y-4">
                    <?php if (!empty($taken)): ?>
                        <?php foreach ($taken as $taak): ?>
                            <div class="border-l-4 border-blue-500 pl-4">
                                <p class="text-sm"><?= h($taak->titel) ?></p>
                                <p class="text-xs text-gray-500">Deadline: <?= h($taak->deadline->format('d-m-Y')) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-gray-500 text-sm">Geen open taken beschikbaar.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Logboek -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-6">Logboek</h2>
                <div class="space-y-4">
                    <?php if (!empty($logboek)): ?>
                        <?php foreach ($logboek as $log): ?>
                            <div class="border-l-2 border-gray-200 pl-4">
                                <p class="text-sm"><?= h($log->actie) ?></p>
                                <p class="text-xs text-gray-500"><?= h($log->datum->format('d-m-Y H:i')) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-gray-500 text-sm">Geen logboekactiviteiten beschikbaar.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
