<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HerinneringenFixture
 */
class HerinneringenFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'herinneringen';
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
                'bericht' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'herinneringsdatum' => '2025-03-04 12:19:53',
                'gemaakt_op' => 1741090793,
                'geupdate_op' => 1741090793,
            ],
        ];
        parent::init();
    }
}
