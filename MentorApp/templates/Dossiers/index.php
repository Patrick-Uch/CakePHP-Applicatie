<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Dossier> $dossiers
 */
?>
<div class="dossiers index content">
    <?= $this->Html->link(__('New Dossier'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Dossiers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('bedrijf_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('naam') ?></th>
                    <th><?= $this->Paginator->sort('email_1') ?></th>
                    <th><?= $this->Paginator->sort('email_2') ?></th>
                    <th><?= $this->Paginator->sort('telefoonnummer_1') ?></th>
                    <th><?= $this->Paginator->sort('telefoonnummer_2') ?></th>
                    <th><?= $this->Paginator->sort('bsn') ?></th>
                    <th><?= $this->Paginator->sort('iban') ?></th>
                    <th><?= $this->Paginator->sort('postadres_straat') ?></th>
                    <th><?= $this->Paginator->sort('postadres_huisnummer') ?></th>
                    <th><?= $this->Paginator->sort('postadres_toevoeging') ?></th>
                    <th><?= $this->Paginator->sort('postadres_gemeente') ?></th>
                    <th><?= $this->Paginator->sort('postadres_provincie') ?></th>
                    <th><?= $this->Paginator->sort('bezoekadres_straat') ?></th>
                    <th><?= $this->Paginator->sort('bezoekadres_huisnummer') ?></th>
                    <th><?= $this->Paginator->sort('bezoekadres_toevoeging') ?></th>
                    <th><?= $this->Paginator->sort('bezoekadres_postcode') ?></th>
                    <th><?= $this->Paginator->sort('bezoekadres_gemeente') ?></th>
                    <th><?= $this->Paginator->sort('bezoekadres_provincie') ?></th>
                    <th><?= $this->Paginator->sort('rechtbank') ?></th>
                    <th><?= $this->Paginator->sort('mb_cb_nummer') ?></th>
                    <th><?= $this->Paginator->sort('betrokkenen_relatie') ?></th>
                    <th><?= $this->Paginator->sort('betrokkenen_voor_achternaam') ?></th>
                    <th><?= $this->Paginator->sort('betrokkenen_telefoonnummer') ?></th>
                    <th><?= $this->Paginator->sort('betrokkenen_email') ?></th>
                    <th><?= $this->Paginator->sort('betrokkenen_straat') ?></th>
                    <th><?= $this->Paginator->sort('betrokkenen_huisnummer') ?></th>
                    <th><?= $this->Paginator->sort('betrokkenen_toevoeging') ?></th>
                    <th><?= $this->Paginator->sort('betrokkenen_postcode') ?></th>
                    <th><?= $this->Paginator->sort('betrokkenen_gemeente') ?></th>
                    <th><?= $this->Paginator->sort('encryption_key_id') ?></th>
                    <th><?= $this->Paginator->sort('gemaakt_op') ?></th>
                    <th><?= $this->Paginator->sort('geupdate_op') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dossiers as $dossier): ?>
                <tr>
                    <td><?= $this->Number->format($dossier->id) ?></td>
                    <td><?= $dossier->hasValue('bedrijf') ? $this->Html->link($dossier->bedrijf->naam, ['controller' => 'Bedrijven', 'action' => 'view', $dossier->bedrijf->id]) : '' ?></td>
                    <td><?= h($dossier->status) ?></td>
                    <td><?= h($dossier->naam) ?></td>
                    <td><?= h($dossier->email_1) ?></td>
                    <td><?= h($dossier->email_2) ?></td>
                    <td><?= h($dossier->telefoonnummer_1) ?></td>
                    <td><?= h($dossier->telefoonnummer_2) ?></td>
                    <td><?= h($dossier->bsn) ?></td>
                    <td><?= h($dossier->iban) ?></td>
                    <td><?= h($dossier->postadres_straat) ?></td>
                    <td><?= h($dossier->postadres_huisnummer) ?></td>
                    <td><?= h($dossier->postadres_toevoeging) ?></td>
                    <td><?= h($dossier->postadres_gemeente) ?></td>
                    <td><?= h($dossier->postadres_provincie) ?></td>
                    <td><?= h($dossier->bezoekadres_straat) ?></td>
                    <td><?= h($dossier->bezoekadres_huisnummer) ?></td>
                    <td><?= h($dossier->bezoekadres_toevoeging) ?></td>
                    <td><?= h($dossier->bezoekadres_postcode) ?></td>
                    <td><?= h($dossier->bezoekadres_gemeente) ?></td>
                    <td><?= h($dossier->bezoekadres_provincie) ?></td>
                    <td><?= h($dossier->rechtbank) ?></td>
                    <td><?= h($dossier->mb_cb_nummer) ?></td>
                    <td><?= h($dossier->betrokkenen_relatie) ?></td>
                    <td><?= h($dossier->betrokkenen_voor_achternaam) ?></td>
                    <td><?= h($dossier->betrokkenen_telefoonnummer) ?></td>
                    <td><?= h($dossier->betrokkenen_email) ?></td>
                    <td><?= h($dossier->betrokkenen_straat) ?></td>
                    <td><?= h($dossier->betrokkenen_huisnummer) ?></td>
                    <td><?= h($dossier->betrokkenen_toevoeging) ?></td>
                    <td><?= h($dossier->betrokkenen_postcode) ?></td>
                    <td><?= h($dossier->betrokkenen_gemeente) ?></td>
                    <td><?= h($dossier->encryption_key_id) ?></td>
                    <td><?= h($dossier->gemaakt_op) ?></td>
                    <td><?= h($dossier->geupdate_op) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $dossier->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dossier->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dossier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dossier->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>