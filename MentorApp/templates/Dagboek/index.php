<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Dagboek> $dagboek
 */
?>
<div class="dagboek index content">
    <?= $this->Html->link(__('New Dagboek'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Dagboek') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('dossier_id') ?></th>
                    <th><?= $this->Paginator->sort('gebruiker_id') ?></th>
                    <th><?= $this->Paginator->sort('gemaakt_op') ?></th>
                    <th><?= $this->Paginator->sort('geupdate_op') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dagboek as $dagboek): ?>
                <tr>
                    <td><?= $this->Number->format($dagboek->id) ?></td>
                    <td><?= $dagboek->hasValue('dossier') ? $this->Html->link($dagboek->dossier->status, ['controller' => 'Dossiers', 'action' => 'view', $dagboek->dossier->id]) : '' ?></td>
                    <td><?= $dagboek->hasValue('gebruiker') ? $this->Html->link($dagboek->gebruiker->naam, ['controller' => 'Gebruikers', 'action' => 'view', $dagboek->gebruiker->id]) : '' ?></td>
                    <td><?= h($dagboek->gemaakt_op) ?></td>
                    <td><?= h($dagboek->geupdate_op) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $dagboek->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dagboek->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dagboek->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dagboek->id)]) ?>
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