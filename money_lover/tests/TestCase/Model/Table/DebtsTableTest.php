<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DebtsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DebtsTable Test Case
 */
class DebtsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DebtsTable
     */
    public $Debts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.debts',
        'app.customers',
        'app.accounts',
        'app.budgets',
        'app.categorys',
        'app.groups',
        'app.recurring_transactions',
        'app.transactions',
        'app.wallets',
        'app.events',
        'app.settings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Debts') ? [] : ['className' => 'App\Model\Table\DebtsTable'];
        $this->Debts = TableRegistry::get('Debts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Debts);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
