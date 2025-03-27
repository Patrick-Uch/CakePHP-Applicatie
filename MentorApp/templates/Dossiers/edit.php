<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dossier $dossier
 * @var string[]|\Cake\Collection\CollectionInterface $bedrijven
 */
?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">Dossier Bewerken</h1>
        <p class="text-gray-600">Hier kun je de gegevens van het dossier wijzigen.</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
    <?= $this->Form->create($dossier, [
    'type' => 'file',
    'class' => 'space-y-6'
]) ?>


        <!-- Bedrijf & Status -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-50 p-4 rounded-lg">
            <?= $this->Form->control('bedrijf_id', [
                'options' => $bedrijven,
                'class' => 'w-full p-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed',
                'label' => ['text' => __('Bedrijf'), 'class' => 'block text-sm font-medium text-gray-700'],
                'disabled' => true,
            ]) ?>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
                <?= $this->Form->control('status', [
                    'options' => ['Opstarten' => 'Opstarten', 'Actief' => 'Actief', 'In beëindiging' => 'In beëindiging', 'Afgesloten' => 'Afgesloten'],
                    'class' => 'w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500',
                    'label' => ['text' => __('Status'), 'class' => 'block text-sm font-medium text-gray-700']
                ]) ?>
            </div>
        </div>

        <!-- Persoonlijke Gegevens -->
        <div class="bg-gray-50 p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Persoonlijke Gegevens</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <?= $this->Form->control('naam', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('bsn', ['value' => $dossier->getBsn(),'class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('iban', ['value' => $dossier->getIban(),'class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('email_1', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('email_2', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('telefoonnummer_1', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('telefoonnummer_2', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
            </div>
        </div>

        <!-- Rechtbank Gegevens -->
        <div class="bg-gray-50 p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Rechtbank Gegevens</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <?= $this->Form->control('rechtbank', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('mb_cb_nummer', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
            </div>
        </div>

        <!-- Adresgegevens -->
        <div class="bg-gray-50 p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Adresgegevens</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <?= $this->Form->control('postadres_straat', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('postadres_huisnummer', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('postadres_toevoeging', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('postadres_postcode', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('postadres_gemeente', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('postadres_provincie', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('bezoekadres_straat', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('bezoekadres_huisnummer', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('bezoekadres_toevoeging', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('bezoekadres_postcode', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('bezoekadres_gemeente', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('bezoekadres_provincie', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
            </div>
        </div>

        <!-- Betrokkenen -->
        <div class="bg-gray-50 p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Betrokkenen</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <?= $this->Form->control('betrokkenen_relatie', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('betrokkenen_voor_achternaam', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('betrokkenen_telefoonnummer', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('betrokkenen_email', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('betrokkenen_straat', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('betrokkenen_huisnummer', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('betrokkenen_toevoeging', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('betrokkenen_postcode', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('betrokkenen_gemeente', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
            </div>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Documenten</h2>

            <?php if (!empty($dossier->documents)) : ?>
                <div class="space-y-4 mb-6">
                    <?php foreach ($dossier->documents as $doc) : ?>
                        <div class="flex items-center justify-between bg-white border border-gray-200 p-4 rounded-lg shadow-sm hover:shadow transition">
                            <div class="truncate">
                                <a href="/<?= h($doc->path) ?>" target="_blank" class="text-blue-600 font-medium hover:underline break-all">
                                    <?= h($doc->name) ?>
                                </a>
                            </div>
                            <div class="ml-4 shrink-0">
                                <?= $this->Form->postLink(
                                    'Verwijder',
                                    ['controller' => 'Documents', 'action' => 'delete', $doc->id],
                                    ['confirm' => 'Weet je zeker dat je dit document wilt verwijderen?', 'class' => 'text-red-500 hover:text-red-700 text-sm font-medium']
                                ) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p class="text-gray-500 italic mb-4">Geen documenten gekoppeld aan dit dossier.</p>
            <?php endif; ?>


            <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Upload nieuw document</label>

            <!-- Onzichtbare File Input -->
            <?= $this->Form->control('document[]', [
                'type' => 'file',
                'id' => 'actual-btn',
                'multiple' => true,
                'label' => false,
                'hidden' => true
            ]) ?>

            <!-- Neppe knop -->
            <label for="actual-btn" class="bg-blue-600 text-white py-2 px-4 rounded cursor-pointer inline-block">
                Bestand kiezen
            </label>

            <!-- File Lijst -->
            <div id="file-list" class="mt-3 space-y-2 text-sm text-gray-700"></div>
            </div>

            <script>
            const actualBtn = document.getElementById('actual-btn');
            const fileList = document.getElementById('file-list');

            actualBtn.addEventListener('change', function () {
                fileList.innerHTML = ''; // Clear previous list

                Array.from(this.files).forEach((file, index) => {
                const fileContainer = document.createElement('div');
                fileContainer.className = "flex items-center justify-between bg-white border border-gray-300 rounded px-3 py-2";

                const fileName = document.createElement('span');
                fileName.textContent = file.name;

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.innerHTML = '&times;';
                removeBtn.className = 'text-red-500 text-xl leading-none hover:text-red-700';
                removeBtn.onclick = () => {
                    const dt = new DataTransfer();
                    const files = Array.from(actualBtn.files).filter((_, i) => i !== index);
                    files.forEach(f => dt.items.add(f));
                    actualBtn.files = dt.files;
                    actualBtn.dispatchEvent(new Event('change'));
                };

                fileContainer.appendChild(fileName);
                fileContainer.appendChild(removeBtn);
                fileList.appendChild(fileContainer);
                });
            });
            </script>


        </div>

        <!-- Actieknoppen -->
        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-300">
            <a href="<?= $this->Url->build(['controller' => 'Dossiers', 'action' => 'index']) ?>" 
               class="px-4 py-2 border border-gray-300 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg">
                Annuleren
            </a>
            <?= $this->Form->button(__('Opslaan'), [
                'class' => 'px-4 py-2 bg-blue-500 text-white text-sm font-medium hover:bg-blue-600 rounded-lg'
            ]) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>
