<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DossiersFixture
 */
class DossiersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'bedrijf_id' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'naam' => 'Lorem ipsum dolor sit amet',
                'email_1' => 'Lorem ipsum dolor sit amet',
                'email_2' => 'Lorem ipsum dolor sit amet',
                'telefoonnummer_1' => 'Lorem ipsum dolor ',
                'telefoonnummer_2' => 'Lorem ipsum dolor ',
                'bsn' => 'Lorem ip',
                'iban' => 'Lorem ipsum dolor sit amet',
                'postadres_straat' => 'Lorem ipsum dolor sit amet',
                'postadres_huisnummer' => 'Lorem ip',
                'postadres_toevoeging' => 'Lorem ip',
                'postadres_gemeente' => 'Lorem ipsum dolor sit amet',
                'postadres_provincie' => 'Lorem ipsum dolor sit amet',
                'bezoekadres_straat' => 'Lorem ipsum dolor sit amet',
                'bezoekadres_huisnummer' => 'Lorem ip',
                'bezoekadres_toevoeging' => 'Lorem ip',
                'bezoekadres_postcode' => 'Lorem ipsum dolor ',
                'bezoekadres_gemeente' => 'Lorem ipsum dolor sit amet',
                'bezoekadres_provincie' => 'Lorem ipsum dolor sit amet',
                'rechtbank' => 'Lorem ipsum dolor sit amet',
                'mb_cb_nummer' => 'Lorem ipsum dolor ',
                'betrokkenen_relatie' => 'Lorem ipsum dolor sit amet',
                'betrokkenen_voor_achternaam' => 'Lorem ipsum dolor sit amet',
                'betrokkenen_telefoonnummer' => 'Lorem ipsum dolor ',
                'betrokkenen_email' => 'Lorem ipsum dolor sit amet',
                'betrokkenen_straat' => 'Lorem ipsum dolor sit amet',
                'betrokkenen_huisnummer' => 'Lorem ipsum dolor ',
                'betrokkenen_toevoeging' => 'Lorem ipsum dolor ',
                'betrokkenen_postcode' => 'Lorem ipsum dolor ',
                'betrokkenen_gemeente' => 'Lorem ipsum dolor sit amet',
                'encryption_key_id' => 'Lorem ipsum dolor sit amet',
                'gemaakt_op' => 1741090485,
                'geupdate_op' => 1741090485,
            ],
        ];
        parent::init();
    }
}
