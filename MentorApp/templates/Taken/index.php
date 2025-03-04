<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Taken> $taken
 */
?>
<div class="taken index content">
    <?= $this->Html->link(__('New Taken'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Taken') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('dossier_id') ?></th>
                    <th><?= $this->Paginator->sort('gebruiker_id') ?></th>
                    <th><?= $this->Paginator->sort('titel') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('deadline') ?></th>
                    <th><?= $this->Paginator->sort('gemaakt_op') ?></th>
                    <th><?= $this->Paginator->sort('geupdate_op') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($taken as $taken): ?>
                <tr>
                    <td><?= $this->Number->format($taken->id) ?></td>
                    <td><?= $taken->hasValue('dossier') ? $this->Html->link($taken->dossier->status, ['controller' => 'Dossiers', 'action' => 'view', $taken->dossier->id]) : '' ?></td>
                    <td><?= $taken->hasValue('gebruiker') ? $this->Html->link($taken->gebruiker->naam, ['controller' => 'Gebruikers', 'action' => 'view', $taken->gebruiker->id]) : '' ?></td>
                    <td><?= h($taken->titel) ?></td>
                    <td><?= h($taken->status) ?></td>
                    <td><?= h($taken->deadline) ?></td>
                    <td><?= h($taken->gemaakt_op) ?></td>
                    <td><?= h($taken->geupdate_op) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $taken->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $taken->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $taken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taken->id)]) ?>
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