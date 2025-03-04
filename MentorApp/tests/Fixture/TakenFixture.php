<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TakenFixture
 */
class TakenFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'taken';
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
                'dossier_id' => 1,
                'gebruiker_id' => 1,
                'titel' => 'Lorem ipsum dolor sit amet',
                'beschrijving' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'status' => 'Lorem ipsum dolor sit amet',
                'deadline' => '2025-03-04',
                'gemaakt_op' => 1741090799,
                'geupdate_op' => 1741090799,
            ],
        ];
        parent::init();
    }
}
