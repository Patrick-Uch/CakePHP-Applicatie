<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dossier $dossier
 * @var \Cake\Collection\CollectionInterface|string[] $bedrijfs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Dossiers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="dossiers form content">
            <?= $this->Form->create($dossier) ?>
            <fieldset>
                <legend><?= __('Add Dossier') ?></legend>
                <?php
                    echo $this->Form->control('bedrijf_id', ['options' => $bedrijven]);
                    echo $this->Form->control('status');
                    echo $this->Form->control('naam');
                    echo $this->Form->control('email_1');
                    echo $this->Form->control('email_2');
                    echo $this->Form->control('telefoonnummer_1');
                    echo $this->Form->control('telefoonnummer_2');
                    echo $this->Form->control('bsn');
                    echo $this->Form->control('iban');
                    echo $this->Form->control('postadres_straat');
                    echo $this->Form->control('postadres_huisnummer');
                    echo $this->Form->control('postadres_toevoeging');
                    echo $this->Form->control('postadres_gemeente');
                    echo $this->Form->control('postadres_provincie');
                    echo $this->Form->control('bezoekadres_straat');
                    echo $this->Form->control('bezoekadres_huisnummer');
                    echo $this->Form->control('bezoekadres_toevoeging');
                    echo $this->Form->control('bezoekadres_postcode');
                    echo $this->Form->control('bezoekadres_gemeente');
                    echo $this->Form->control('bezoekadres_provincie');
                    echo $this->Form->control('rechtbank');
                    echo $this->Form->control('mb_cb_nummer');
                    echo $this->Form->control('betrokkenen_relatie');
                    echo $this->Form->control('betrokkenen_voor_achternaam');
                    echo $this->Form->control('betrokkenen_telefoonnummer');
                    echo $this->Form->control('betrokkenen_email');
                    echo $this->Form->control('betrokkenen_straat');
                    echo $this->Form->control('betrokkenen_huisnummer');
                    echo $this->Form->control('betrokkenen_toevoeging');
                    echo $this->Form->control('betrokkenen_postcode');
                    echo $this->Form->control('betrokkenen_gemeente');
                    echo $this->Form->control('encryption_key_id');
                    echo $this->Form->control('gemaakt_op');
                    echo $this->Form->control('geupdate_op');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
