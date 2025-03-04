<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dagboek $dagboek
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Dagboek'), ['action' => 'edit', $dagboek->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Dagboek'), ['action' => 'delete', $dagboek->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dagboek->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Dagboek'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Dagboek'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="dagboek view content">
            <h3><?= h($dagboek->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dossier') ?></th>
                    <td><?= $dagboek->hasValue('dossier') ? $this->Html->link($dagboek->dossier->status, ['controller' => 'Dossiers', 'action' => 'view', $dagboek->dossier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gebruiker') ?></th>
                    <td><?= $dagboek->hasValue('gebruiker') ? $this->Html->link($dagboek->gebruiker->naam, ['controller' => 'Gebruikers', 'action' => 'view', $dagboek->gebruiker->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($dagboek->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gemaakt Op') ?></th>
                    <td><?= h($dagboek->gemaakt_op) ?></td>
                </tr>
                <tr>
                    <th><?= __('Geupdate Op') ?></th>
                    <td><?= h($dagboek->geupdate_op) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Onderwerp') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($dagboek->onderwerp)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Text') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($dagboek->text)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>