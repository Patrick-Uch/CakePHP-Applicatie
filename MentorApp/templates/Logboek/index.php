<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Logboek> $logboek
 */
?>
<div class="logboek index content">
    <?= $this->Html->link(__('New Logboek'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Logboek') ?></h3>
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
                <?php foreach ($logboek as $logboek): ?>
                <tr>
                    <td><?= $this->Number->format($logboek->id) ?></td>
                    <td><?= $logboek->hasValue('dossier') ? $this->Html->link($logboek->dossier->status, ['controller' => 'Dossiers', 'action' => 'view', $logboek->dossier->id]) : '' ?></td>
                    <td><?= $logboek->hasValue('gebruiker') ? $this->Html->link($logboek->gebruiker->naam, ['controller' => 'Gebruikers', 'action' => 'view', $logboek->gebruiker->id]) : '' ?></td>
                    <td><?= h($logboek->gemaakt_op) ?></td>
                    <td><?= h($logboek->geupdate_op) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $logboek->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $logboek->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $logboek->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logboek->id)]) ?>
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