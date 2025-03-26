<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dossier $dossier
 */
?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">Dossier Details</h1>
        <p class="text-gray-600">Overzicht van de dossiergegevens.</p>
    </div>

    <!-- Bedrijf & Status -->
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Algemene Informatie</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?= showField('Bedrijf', $dossier->bedrijven->naam ?? null) ?>
            <?= showField('Status', $dossier->status) ?>
        </div>
    </div>


    <?php
    function showField($label, $value) {
        return '
            <div>
                <label class="block text-sm font-medium text-gray-700">' . h($label) . '</label>
                <div class="mt-1 p-2 border rounded-lg bg-gray-100 min-h-[42px]">' . (h($value) ?: '<span class="text-gray-400 italic">Geen gegevens</span>') . '</div>
            </div>';
    }
    ?>

    <!-- Persoonlijke Gegevens -->
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Persoonlijke Gegevens</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?= showField('Naam', $dossier->naam) ?>
            <?= showField('Bsn', $dossier->getBsn()) ?>
            <?= showField('Iban', $dossier->getIban()) ?>
            <?= showField('Email 1', $dossier->email_1) ?>
            <?= showField('Email 2', $dossier->email_2) ?>
            <?= showField('Telefoonnummer 1', $dossier->telefoonnummer_1) ?>
            <?= showField('Telefoonnummer 2', $dossier->telefoonnummer_2) ?>
        </div>
    </div>

    <!-- Rechtbank Gegevens -->
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Rechtbank Gegevens</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?= showField('Rechtbank', $dossier->rechtbank) ?>
            <?= showField('MB/CB Nummer', $dossier->mb_cb_nummer) ?>
        </div>
    </div>

    <!-- Adresgegevens -->
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Adresgegevens</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php
            $adresvelden = [
                'postadres_straat', 'postadres_huisnummer', 'postadres_toevoeging', 'postadres_postcode',
                'postadres_gemeente', 'postadres_provincie', 'bezoekadres_straat', 'bezoekadres_huisnummer',
                'bezoekadres_toevoeging', 'bezoekadres_postcode', 'bezoekadres_gemeente', 'bezoekadres_provincie'
            ];
            foreach ($adresvelden as $veld) {
                echo showField(ucfirst(str_replace('_', ' ', $veld)), $dossier->$veld);
            }
            ?>
        </div>
    </div>

    <!-- Betrokkenen -->
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Betrokkenen</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php
            $betrokkenen = [
                'betrokkenen_relatie', 'betrokkenen_voor_achternaam', 'betrokkenen_telefoonnummer',
                'betrokkenen_email', 'betrokkenen_straat', 'betrokkenen_huisnummer',
                'betrokkenen_toevoeging', 'betrokkenen_postcode', 'betrokkenen_gemeente'
            ];
            foreach ($betrokkenen as $veld) {
                echo showField(ucfirst(str_replace('_', ' ', $veld)), $dossier->$veld);
            }
            ?>
        </div>
    </div>
        <!-- Documenten -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Documenten</h2>

            <?php if (!empty($dossier->documents)) : ?>
                <div class="space-y-3">
                    <?php foreach ($dossier->documents as $document) : ?>
                        <div class="flex items-center justify-between p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.586-6.586A4 4 0 0015.172 7z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l2-2"/>
                                </svg>
                                <a href="<?= $this->Url->build('/' . h($document->path)) ?>" class="text-blue-600 hover:underline" target="_blank">
                                    <?= h($document->name) ?>
                                </a>
                            </div>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['controller' => 'Documents', 'action' => 'delete', $document->id],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $document->name), 'class' => 'btn btn-danger']
                            ) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="flex items-center p-4 bg-gray-100 rounded-lg">
                    <span class="text-gray-700 italic">Geen documenten gekoppeld aan dit dossier</span>
                </div>
            <?php endif; ?>
        </div>
</div>
