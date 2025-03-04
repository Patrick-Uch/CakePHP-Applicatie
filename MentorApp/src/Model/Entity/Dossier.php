<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dossier Entity
 *
 * @property int $id
 * @property int $bedrijf_id
 * @property string $status
 * @property string $naam
 * @property string $email_1
 * @property string|null $email_2
 * @property string $telefoonnummer_1
 * @property string|null $telefoonnummer_2
 * @property string $bsn
 * @property string $iban
 * @property string $postadres_straat
 * @property string $postadres_huisnummer
 * @property string $postadres_toevoeging
 * @property string $postadres_gemeente
 * @property string $postadres_provincie
 * @property string $bezoekadres_straat
 * @property string $bezoekadres_huisnummer
 * @property string $bezoekadres_toevoeging
 * @property string $bezoekadres_postcode
 * @property string $bezoekadres_gemeente
 * @property string $bezoekadres_provincie
 * @property string $rechtbank
 * @property string $mb_cb_nummer
 * @property string|null $betrokkenen_relatie
 * @property string|null $betrokkenen_voor_achternaam
 * @property string|null $betrokkenen_telefoonnummer
 * @property string|null $betrokkenen_email
 * @property string|null $betrokkenen_straat
 * @property string|null $betrokkenen_huisnummer
 * @property string|null $betrokkenen_toevoeging
 * @property string|null $betrokkenen_postcode
 * @property string|null $betrokkenen_gemeente
 * @property string|null $encryption_key_id
 * @property \Cake\I18n\DateTime $gemaakt_op
 * @property \Cake\I18n\DateTime $geupdate_op
 *
 * @property \App\Model\Entity\Bedrijven $bedrijf
 * @property \App\Model\Entity\Dagboek[] $dagboek
 * @property \App\Model\Entity\Herinneringen[] $herinneringen
 * @property \App\Model\Entity\Logboek[] $logboek
 * @property \App\Model\Entity\Taken[] $taken
 */
class Dossier extends Entity
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
        'bedrijf_id' => true,
        'status' => true,
        'naam' => true,
        'email_1' => true,
        'email_2' => true,
        'telefoonnummer_1' => true,
        'telefoonnummer_2' => true,
        'bsn' => true,
        'iban' => true,
        'postadres_straat' => true,
        'postadres_huisnummer' => true,
        'postadres_toevoeging' => true,
        'postadres_gemeente' => true,
        'postadres_provincie' => true,
        'bezoekadres_straat' => true,
        'bezoekadres_huisnummer' => true,
        'bezoekadres_toevoeging' => true,
        'bezoekadres_postcode' => true,
        'bezoekadres_gemeente' => true,
        'bezoekadres_provincie' => true,
        'rechtbank' => true,
        'mb_cb_nummer' => true,
        'betrokkenen_relatie' => true,
        'betrokkenen_voor_achternaam' => true,
        'betrokkenen_telefoonnummer' => true,
        'betrokkenen_email' => true,
        'betrokkenen_straat' => true,
        'betrokkenen_huisnummer' => true,
        'betrokkenen_toevoeging' => true,
        'betrokkenen_postcode' => true,
        'betrokkenen_gemeente' => true,
        'encryption_key_id' => true,
        'gemaakt_op' => true,
        'geupdate_op' => true,
        'bedrijf' => true,
        'dagboek' => true,
        'herinneringen' => true,
        'logboek' => true,
        'taken' => true,
    ];
}
