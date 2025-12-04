<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IngredientsRecipiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IngredientsRecipiesTable Test Case
 */
class IngredientsRecipiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IngredientsRecipiesTable
     */
    protected $IngredientsRecipies;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.IngredientsRecipies',
        'app.Recipies',
        'app.Ingredients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('IngredientsRecipies') ? [] : ['className' => IngredientsRecipiesTable::class];
        $this->IngredientsRecipies = $this->getTableLocator()->get('IngredientsRecipies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->IngredientsRecipies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\IngredientsRecipiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\IngredientsRecipiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
