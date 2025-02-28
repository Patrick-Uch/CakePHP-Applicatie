<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BedrijvenFixture
 */
class BedrijvenFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'bedrijven';
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
                'naam' => 'Lorem ipsum dolor sit amet',
                'adres' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'telefoonnummer' => 'Lorem ipsum dolor ',
                'gemaakt_op' => 1740745738,
                'geupdate_op' => 1740745738,
            ],
        ];
        parent::init();
    }
}
