<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Herinneringen $herinneringen
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
                ['action' => 'delete', $herinneringen->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $herinneringen->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Herinneringen'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="herinneringen form content">
            <?= $this->Form->create($herinneringen) ?>
            <fieldset>
                <legend><?= __('Edit Herinneringen') ?></legend>
                <?php
                    echo $this->Form->control('dossier_id', ['options' => $dossiers]);
                    echo $this->Form->control('gebruiker_id', ['options' => $gebruikers, 'empty' => true]);
                    echo $this->Form->control('bericht');
                    echo $this->Form->control('herinneringsdatum');
                    echo $this->Form->control('gemaakt_op');
                    echo $this->Form->control('geupdate_op');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
