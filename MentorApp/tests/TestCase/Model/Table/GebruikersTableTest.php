<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GebruikersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GebruikersTable Test Case
 */
class GebruikersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GebruikersTable
     */
    protected $Gebruikers;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Gebruikers',
        'app.Bedrijfs',
        'app.Dagboek',
        'app.Herinneringen',
        'app.Logboek',
        'app.Taken',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Gebruikers') ? [] : ['className' => GebruikersTable::class];
        $this->Gebruikers = $this->getTableLocator()->get('Gebruikers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Gebruikers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GebruikersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\GebruikersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
