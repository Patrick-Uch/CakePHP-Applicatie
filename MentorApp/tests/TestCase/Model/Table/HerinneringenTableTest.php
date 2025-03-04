<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HerinneringenTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HerinneringenTable Test Case
 */
class HerinneringenTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HerinneringenTable
     */
    protected $Herinneringen;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Herinneringen',
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
        $config = $this->getTableLocator()->exists('Herinneringen') ? [] : ['className' => HerinneringenTable::class];
        $this->Herinneringen = $this->getTableLocator()->get('Herinneringen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Herinneringen);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HerinneringenTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\HerinneringenTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
