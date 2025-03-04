<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Herinneringen $herinneringen
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Herinneringen'), ['action' => 'edit', $herinneringen->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Herinneringen'), ['action' => 'delete', $herinneringen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $herinneringen->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Herinneringen'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Herinneringen'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="herinneringen view content">
            <h3><?= h($herinneringen->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dossier') ?></th>
                    <td><?= $herinneringen->hasValue('dossier') ? $this->Html->link($herinneringen->dossier->status, ['controller' => 'Dossiers', 'action' => 'view', $herinneringen->dossier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gebruiker') ?></th>
                    <td><?= $herinneringen->hasValue('gebruiker') ? $this->Html->link($herinneringen->gebruiker->naam, ['controller' => 'Gebruikers', 'action' => 'view', $herinneringen->gebruiker->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($herinneringen->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Herinneringsdatum') ?></th>
                    <td><?= h($herinneringen->herinneringsdatum) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gemaakt Op') ?></th>
                    <td><?= h($herinneringen->gemaakt_op) ?></td>
                </tr>
                <tr>
                    <th><?= __('Geupdate Op') ?></th>
                    <td><?= h($herinneringen->geupdate_op) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Bericht') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($herinneringen->bericht)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>