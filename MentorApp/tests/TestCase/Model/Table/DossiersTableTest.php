<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DossiersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DossiersTable Test Case
 */
class DossiersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DossiersTable
     */
    protected $Dossiers;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Dossiers',
        'app.Bedrijven',
        'app.Dagboek',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Dossiers') ? [] : ['className' => DossiersTable::class];
        $this->Dossiers = $this->getTableLocator()->get('Dossiers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Dossiers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DossiersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
