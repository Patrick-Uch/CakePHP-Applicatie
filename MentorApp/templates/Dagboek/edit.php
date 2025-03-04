<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dagboek $dagboek
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
                ['action' => 'delete', $dagboek->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dagboek->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Dagboek'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="dagboek form content">
            <?= $this->Form->create($dagboek) ?>
            <fieldset>
                <legend><?= __('Edit Dagboek') ?></legend>
                <?php
                    echo $this->Form->control('dossier_id', ['options' => $dossiers]);
                    echo $this->Form->control('gebruiker_id', ['options' => $gebruikers]);
                    echo $this->Form->control('onderwerp');
                    echo $this->Form->control('text');
                    echo $this->Form->control('gemaakt_op');
                    echo $this->Form->control('geupdate_op');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
