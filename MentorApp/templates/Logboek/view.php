<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Logboek $logboek
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Logboek'), ['action' => 'edit', $logboek->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Logboek'), ['action' => 'delete', $logboek->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logboek->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Logboek'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Logboek'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="logboek view content">
            <h3><?= h($logboek->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dossier') ?></th>
                    <td><?= $logboek->hasValue('dossier') ? $this->Html->link($logboek->dossier->status, ['controller' => 'Dossiers', 'action' => 'view', $logboek->dossier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gebruiker') ?></th>
                    <td><?= $logboek->hasValue('gebruiker') ? $this->Html->link($logboek->gebruiker->naam, ['controller' => 'Gebruikers', 'action' => 'view', $logboek->gebruiker->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($logboek->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gemaakt Op') ?></th>
                    <td><?= h($logboek->gemaakt_op) ?></td>
                </tr>
                <tr>
                    <th><?= __('Geupdate Op') ?></th>
                    <td><?= h($logboek->geupdate_op) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Actie') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($logboek->actie)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>