<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Logboek $logboek
 * @var \Cake\Collection\CollectionInterface|string[] $dossiers
 * @var \Cake\Collection\CollectionInterface|string[] $gebruikers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Logboek'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="logboek form content">
            <?= $this->Form->create($logboek) ?>
            <fieldset>
                <legend><?= __('Add Logboek') ?></legend>
                <?php
                    echo $this->Form->control('dossier_id', ['options' => $dossiers]);
                    echo $this->Form->control('gebruiker_id', ['options' => $gebruikers]);
                    echo $this->Form->control('actie');
                    echo $this->Form->control('gemaakt_op');
                    echo $this->Form->control('geupdate_op');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
