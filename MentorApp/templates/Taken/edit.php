<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taken $taken
 * @var string[]|\Cake\Collection\CollectionInterface $dossiers
 * @var string[]|\Cake\Collection\CollectionInterface $gebruikers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $taken->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $taken->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Taken'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="taken form content">
            <?= $this->Form->create($taken) ?>
            <fieldset>
                <legend><?= __('Edit Taken') ?></legend>
                <?php
                    echo $this->Form->control('dossier_id', ['options' => $dossiers]);
                    echo $this->Form->control('gebruiker_id', ['options' => $gebruikers]);
                    echo $this->Form->control('titel');
                    echo $this->Form->control('beschrijving');
                    echo $this->Form->control('status');
                    echo $this->Form->control('deadline');
                    echo $this->Form->control('gemaakt_op');
                    echo $this->Form->control('geupdate_op');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
