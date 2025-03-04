<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogboekTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogboekTable Test Case
 */
class LogboekTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LogboekTable
     */
    protected $Logboek;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Logboek',
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
        $config = $this->getTableLocator()->exists('Logboek') ? [] : ['className' => LogboekTable::class];
        $this->Logboek = $this->getTableLocator()->get('Logboek', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Logboek);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LogboekTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LogboekTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
