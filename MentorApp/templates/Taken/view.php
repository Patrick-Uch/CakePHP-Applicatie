<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taken $taken
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Taken'), ['action' => 'edit', $taken->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Taken'), ['action' => 'delete', $taken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taken->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Taken'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Taken'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="taken view content">
            <h3><?= h($taken->titel) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dossier') ?></th>
                    <td><?= $taken->hasValue('dossier') ? $this->Html->link($taken->dossier->status, ['controller' => 'Dossiers', 'action' => 'view', $taken->dossier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gebruiker') ?></th>
                    <td><?= $taken->hasValue('gebruiker') ? $this->Html->link($taken->gebruiker->naam, ['controller' => 'Gebruikers', 'action' => 'view', $taken->gebruiker->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Titel') ?></th>
                    <td><?= h($taken->titel) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($taken->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($taken->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deadline') ?></th>
                    <td><?= h($taken->deadline) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gemaakt Op') ?></th>
                    <td><?= h($taken->gemaakt_op) ?></td>
                </tr>
                <tr>
                    <th><?= __('Geupdate Op') ?></th>
                    <td><?= h($taken->geupdate_op) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Beschrijving') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($taken->beschrijving)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>