<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Herinneringen> $herinneringen
 */
?>
<div class="herinneringen index content">
    <?= $this->Html->link(__('New Herinneringen'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Herinneringen') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('dossier_id') ?></th>
                    <th><?= $this->Paginator->sort('gebruiker_id') ?></th>
                    <th><?= $this->Paginator->sort('herinneringsdatum') ?></th>
                    <th><?= $this->Paginator->sort('gemaakt_op') ?></th>
                    <th><?= $this->Paginator->sort('geupdate_op') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($herinneringen as $herinneringen): ?>
                <tr>
                    <td><?= $this->Number->format($herinneringen->id) ?></td>
                    <td><?= $herinneringen->hasValue('dossier') ? $this->Html->link($herinneringen->dossier->status, ['controller' => 'Dossiers', 'action' => 'view', $herinneringen->dossier->id]) : '' ?></td>
                    <td><?= $herinneringen->hasValue('gebruiker') ? $this->Html->link($herinneringen->gebruiker->naam, ['controller' => 'Gebruikers', 'action' => 'view', $herinneringen->gebruiker->id]) : '' ?></td>
                    <td><?= h($herinneringen->herinneringsdatum) ?></td>
                    <td><?= h($herinneringen->gemaakt_op) ?></td>
                    <td><?= h($herinneringen->geupdate_op) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $herinneringen->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $herinneringen->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $herinneringen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $herinneringen->id)]) ?>
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