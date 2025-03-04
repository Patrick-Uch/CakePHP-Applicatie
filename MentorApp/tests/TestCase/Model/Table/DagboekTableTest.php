<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DagboekTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DagboekTable Test Case
 */
class DagboekTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DagboekTable
     */
    protected $Dagboek;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Dagboek',
        'app.Dossiers',
        'app.Gebruikers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Dagboek') ? [] : ['className' => DagboekTable::class];
        $this->Dagboek = $this->getTableLocator()->get('Dagboek', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Dagboek);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DagboekTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DagboekTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
