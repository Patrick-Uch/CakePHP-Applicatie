<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dossier $dossier
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Dossier'), ['action' => 'edit', $dossier->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Dossier'), ['action' => 'delete', $dossier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dossier->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Dossiers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Dossier'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="dossiers view content">
            <h3><?= h($dossier->status) ?></h3>
            <table>
                <tr>
                    <th><?= __('Bedrijf') ?></th>
                    <td><?= $dossier->hasValue('bedrijf') ? $this->Html->link($dossier->bedrijf->naam, ['controller' => 'Bedrijven', 'action' => 'view', $dossier->bedrijf->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($dossier->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Naam') ?></th>
                    <td><?= h($dossier->naam) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email 1') ?></th>
                    <td><?= h($dossier->email_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email 2') ?></th>
                    <td><?= h($dossier->email_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefoonnummer 1') ?></th>
                    <td><?= h($dossier->telefoonnummer_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefoonnummer 2') ?></th>
                    <td><?= h($dossier->telefoonnummer_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bsn') ?></th>
                    <td><?= h($dossier->bsn) ?></td>
                </tr>
                <tr>
                    <th><?= __('Iban') ?></th>
                    <td><?= h($dossier->iban) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postadres Straat') ?></th>
                    <td><?= h($dossier->postadres_straat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postadres Huisnummer') ?></th>
                    <td><?= h($dossier->postadres_huisnummer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postadres Toevoeging') ?></th>
                    <td><?= h($dossier->postadres_toevoeging) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postadres Gemeente') ?></th>
                    <td><?= h($dossier->postadres_gemeente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postadres Provincie') ?></th>
                    <td><?= h($dossier->postadres_provincie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bezoekadres Straat') ?></th>
                    <td><?= h($dossier->bezoekadres_straat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bezoekadres Huisnummer') ?></th>
                    <td><?= h($dossier->bezoekadres_huisnummer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bezoekadres Toevoeging') ?></th>
                    <td><?= h($dossier->bezoekadres_toevoeging) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bezoekadres Postcode') ?></th>
                    <td><?= h($dossier->bezoekadres_postcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bezoekadres Gemeente') ?></th>
                    <td><?= h($dossier->bezoekadres_gemeente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bezoekadres Provincie') ?></th>
                    <td><?= h($dossier->bezoekadres_provincie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rechtbank') ?></th>
                    <td><?= h($dossier->rechtbank) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mb Cb Nummer') ?></th>
                    <td><?= h($dossier->mb_cb_nummer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Betrokkenen Relatie') ?></th>
                    <td><?= h($dossier->betrokkenen_relatie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Betrokkenen Voor Achternaam') ?></th>
                    <td><?= h($dossier->betrokkenen_voor_achternaam) ?></td>
                </tr>
                <tr>
                    <th><?= __('Betrokkenen Telefoonnummer') ?></th>
                    <td><?= h($dossier->betrokkenen_telefoonnummer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Betrokkenen Email') ?></th>
                    <td><?= h($dossier->betrokkenen_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Betrokkenen Straat') ?></th>
                    <td><?= h($dossier->betrokkenen_straat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Betrokkenen Huisnummer') ?></th>
                    <td><?= h($dossier->betrokkenen_huisnummer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Betrokkenen Toevoeging') ?></th>
                    <td><?= h($dossier->betrokkenen_toevoeging) ?></td>
                </tr>
                <tr>
                    <th><?= __('Betrokkenen Postcode') ?></th>
                    <td><?= h($dossier->betrokkenen_postcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Betrokkenen Gemeente') ?></th>
                    <td><?= h($dossier->betrokkenen_gemeente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Encryption Key Id') ?></th>
                    <td><?= h($dossier->encryption_key_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($dossier->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gemaakt Op') ?></th>
                    <td><?= h($dossier->gemaakt_op) ?></td>
                </tr>
                <tr>
                    <th><?= __('Geupdate Op') ?></th>
                    <td><?= h($dossier->geupdate_op) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Dagboek') ?></h4>
                <?php if (!empty($dossier->dagboek)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Dossier Id') ?></th>
                            <th><?= __('Gebruiker Id') ?></th>
                            <th><?= __('Onderwerp') ?></th>
                            <th><?= __('Text') ?></th>
                            <th><?= __('Gemaakt Op') ?></th>
                            <th><?= __('Geupdate Op') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dossier->dagboek as $dagboek) : ?>
                        <tr>
                            <td><?= h($dagboek->id) ?></td>
                            <td><?= h($dagboek->dossier_id) ?></td>
                            <td><?= h($dagboek->gebruiker_id) ?></td>
                            <td><?= h($dagboek->onderwerp) ?></td>
                            <td><?= h($dagboek->text) ?></td>
                            <td><?= h($dagboek->gemaakt_op) ?></td>
                            <td><?= h($dagboek->geupdate_op) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Dagboek', 'action' => 'view', $dagboek->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Dagboek', 'action' => 'edit', $dagboek->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Dagboek', 'action' => 'delete', $dagboek->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dagboek->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Herinneringen') ?></h4>
                <?php if (!empty($dossier->herinneringen)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Dossier Id') ?></th>
                            <th><?= __('Gebruiker Id') ?></th>
                            <th><?= __('Bericht') ?></th>
                            <th><?= __('Herinneringsdatum') ?></th>
                            <th><?= __('Gemaakt Op') ?></th>
                            <th><?= __('Geupdate Op') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dossier->herinneringen as $herinneringen) : ?>
                        <tr>
                            <td><?= h($herinneringen->id) ?></td>
                            <td><?= h($herinneringen->dossier_id) ?></td>
                            <td><?= h($herinneringen->gebruiker_id) ?></td>
                            <td><?= h($herinneringen->bericht) ?></td>
                            <td><?= h($herinneringen->herinneringsdatum) ?></td>
                            <td><?= h($herinneringen->gemaakt_op) ?></td>
                            <td><?= h($herinneringen->geupdate_op) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Herinneringen', 'action' => 'view', $herinneringen->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Herinneringen', 'action' => 'edit', $herinneringen->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Herinneringen', 'action' => 'delete', $herinneringen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $herinneringen->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Logboek') ?></h4>
                <?php if (!empty($dossier->logboek)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Dossier Id') ?></th>
                            <th><?= __('Gebruiker Id') ?></th>
                            <th><?= __('Actie') ?></th>
                            <th><?= __('Gemaakt Op') ?></th>
                            <th><?= __('Geupdate Op') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dossier->logboek as $logboek) : ?>
                        <tr>
                            <td><?= h($logboek->id) ?></td>
                            <td><?= h($logboek->dossier_id) ?></td>
                            <td><?= h($logboek->gebruiker_id) ?></td>
                            <td><?= h($logboek->actie) ?></td>
                            <td><?= h($logboek->gemaakt_op) ?></td>
                            <td><?= h($logboek->geupdate_op) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Logboek', 'action' => 'view', $logboek->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Logboek', 'action' => 'edit', $logboek->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Logboek', 'action' => 'delete', $logboek->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logboek->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Taken') ?></h4>
                <?php if (!empty($dossier->taken)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Dossier Id') ?></th>
                            <th><?= __('Gebruiker Id') ?></th>
                            <th><?= __('Titel') ?></th>
                            <th><?= __('Beschrijving') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Deadline') ?></th>
                            <th><?= __('Gemaakt Op') ?></th>
                            <th><?= __('Geupdate Op') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dossier->taken as $taken) : ?>
                        <tr>
                            <td><?= h($taken->id) ?></td>
                            <td><?= h($taken->dossier_id) ?></td>
                            <td><?= h($taken->gebruiker_id) ?></td>
                            <td><?= h($taken->titel) ?></td>
                            <td><?= h($taken->beschrijving) ?></td>
                            <td><?= h($taken->status) ?></td>
                            <td><?= h($taken->deadline) ?></td>
                            <td><?= h($taken->gemaakt_op) ?></td>
                            <td><?= h($taken->geupdate_op) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Taken', 'action' => 'view', $taken->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Taken', 'action' => 'edit', $taken->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Taken', 'action' => 'delete', $taken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taken->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>