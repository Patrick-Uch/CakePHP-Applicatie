<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- Zoekbalk -->
    <div class="mb-8">
        <div class="relative">
            <input type="text" placeholder="Zoek in instellingen..." class="w-full bg-gray-100 border border-gray-300 rounded-lg pl-12 pr-4 py-3 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
    </div>

    <!-- Grid voor instellingen secties -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Meldingen Voorkeuren -->
        <section class="bg-white rounded-2xl shadow-lg p-6 transition-all hover:shadow-xl">
            <h2 class="text-lg font-semibold mb-4 flex items-center">
                <i class="fas fa-bell text-blue-500 mr-3"></i> Meldingen Voorkeuren
            </h2>
            <div class="space-y-4">
                <?php
                $notifications = [
                    'E-mailmeldingen' => 'Ontvang updates via e-mail',
                    'Systeemmeldingen' => 'Belangrijke systeemnotificaties',
                    'Beveiligingswaarschuwingen' => 'Meldingen over beveiligingsincidenten'
                ];
                ?>
                <?php foreach ($notifications as $title => $description): ?>
                    <div class="flex items-center justify-between border-b pb-3 last:border-none">
                        <div>
                            <h3 class="font-medium"><?= $title ?></h3>
                            <p class="text-sm text-gray-500"><?= $description ?></p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-300 rounded-full peer-checked:bg-blue-500 peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:border-gray-300 after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Privacy Instellingen -->
        <section class="bg-white rounded-2xl shadow-lg p-6 transition-all hover:shadow-xl">
            <h2 class="text-lg font-semibold mb-4 flex items-center">
                <i class="fas fa-shield-alt text-blue-500 mr-3"></i> Privacy Instellingen
            </h2>
            <div class="space-y-4">
                <div class="flex items-center justify-between border-b pb-3 last:border-none">
                    <div>
                        <h3 class="font-medium">Profielzichtbaarheid</h3>
                        <p class="text-sm text-gray-500">Beheer wie je profiel kan zien</p>
                    </div>
                    <select class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 px-3 py-2 w-40">
                        <option>Openbaar</option>
                        <option>Privé</option>
                        <option>Alleen vrienden</option>
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-medium">Gegevens delen</h3>
                        <p class="text-sm text-gray-500">Beheer instellingen voor gegevensdeling</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-300 rounded-full peer-checked:bg-blue-500 peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:border-gray-300 after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    </label>
                </div>
            </div>
        </section>

        <!-- Thema Instellingen -->
        <section class="bg-white rounded-2xl shadow-lg p-6 transition-all hover:shadow-xl">
            <h2 class="text-lg font-semibold mb-4 flex items-center">
                <i class="fas fa-palette text-blue-500 mr-3"></i> Thema Instellingen
            </h2>
            <div class="space-y-4">
                <h3 class="font-medium">Kleurthema</h3>
                <div class="flex justify-between items-center">
                    <span>Donkere modus</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" id="darkModeToggle">
                        <div class="w-11 h-6 bg-gray-300 rounded-full peer-checked:bg-blue-500 peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:border-gray-300 after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    </label>
                </div>
            </div>
        </section>

        <!-- Taal & Regio -->
        <section class="bg-white rounded-2xl shadow-lg p-6 transition-all hover:shadow-xl">
            <h2 class="text-lg font-semibold mb-4 flex items-center">
                <i class="fas fa-globe text-blue-500 mr-3"></i> Taal & Regio
            </h2>
            <div class="space-y-4">
                <h3 class="font-medium">Taalinstellingen</h3>
                <select class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                    <option>Nederlands</option>
                    <option>Engels</option>
                    <option>Frans</option>
                    <option>Duits</option>
                    <option>Spaans</option>
                </select>

                <h3 class="font-medium">Tijdzone</h3>
                <select class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                    <option>UTC (GMT+0)</option>
                    <option>Amsterdam (UTC+1)</option>
                    <option>New York (UTC-5)</option>
                    <option>Tokyo (UTC+9)</option>
                </select>
            </div>
        </section>
    </div>

    <!-- Help & Ondersteuning -->
    <section class="mt-8 bg-white rounded-2xl shadow-lg p-6 transition-all hover:shadow-xl">
        <h2 class="text-lg font-semibold mb-4 flex items-center">
            <i class="fas fa-question-circle text-blue-500 mr-3"></i> Help & Ondersteuning
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $helpSections = [
                "Documentatie" => "Blader door onze handleidingen en documentatie",
                "Veelgestelde vragen (FAQ)" => "Vind antwoorden op veelvoorkomende vragen",
                "Contact opnemen" => "Neem contact op met onze ondersteuning"
            ];
            ?>
            <?php foreach ($helpSections as $title => $description): ?>
                <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                    <h3 class="font-medium mb-2"><?= $title ?></h3>
                    <p class="text-sm text-gray-500"><?= $description ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>
