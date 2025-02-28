<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BedrijvenTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BedrijvenTable Test Case
 */
class BedrijvenTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BedrijvenTable
     */
    protected $Bedrijven;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Bedrijven',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Bedrijven') ? [] : ['className' => BedrijvenTable::class];
        $this->Bedrijven = $this->getTableLocator()->get('Bedrijven', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Bedrijven);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BedrijvenTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
