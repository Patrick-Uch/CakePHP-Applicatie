<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Taken Entity
 *
 * @property int $id
 * @property int $dossier_id
 * @property int $gebruiker_id
 * @property string $titel
 * @property string $beschrijving
 * @property string $status
 * @property \Cake\I18n\Date $deadline
 * @property \Cake\I18n\DateTime $gemaakt_op
 * @property \Cake\I18n\DateTime $geupdate_op
 *
 * @property \App\Model\Entity\Dossier $dossier
 * @property \App\Model\Entity\Gebruiker $gebruiker
 */
class Taken extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'dossier_id' => true,
        'gebruiker_id' => true,
        'titel' => true,
        'beschrijving' => true,
        'status' => true,
        'deadline' => true,
        'gemaakt_op' => true,
        'geupdate_op' => true,
        'dossier' => true,
        'gebruiker' => true,
    ];
}
