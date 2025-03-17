<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dossier $dossier
 * @var \App\Model\Entity\Bedrijf $bedrijf
 */
?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Pagina titel en beschrijving -->
    <div class="mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">Nieuw Dossier Toevoegen</h1>
        <p class="text-gray-600">Vul de gegevens in om een nieuw dossier aan te maken.</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <?= $this->Form->create($dossier, ['class' => 'space-y-6']) ?>

        <!-- Bedrijf & Status -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-50 p-4 rounded-lg">
                <label class="block text-sm font-medium text-gray-700">Bedrijf</label>
                <input type="text" value="<?= h($bedrijf->naam) ?>"
                       class="w-full p-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" disabled>

                <!-- Verberg het bedrijf_id veld zodat het correct wordt opgeslagen -->
                <?= $this->Form->hidden('bedrijf_id', ['value' => $bedrijf->id]) ?>
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
                <?= $this->Form->control('bsn', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
                <?= $this->Form->control('iban', ['class' => 'w-full p-2 border border-gray-300 rounded-lg']) ?>
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
