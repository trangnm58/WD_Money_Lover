<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecurringTransactionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecurringTransactionsTable Test Case
 */
class RecurringTransactionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecurringTransactionsTable
     */
    public $RecurringTransactions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recurring_transactions',
        'app.customers',
        'app.accounts',
        'app.wallets',
        'app.budgets',
        'app.categorys',
        'app.groups',
        'app.transactions',
        'app.debts',
        'app.events',
        'app.settings',
        'app.units'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RecurringTransactions') ? [] : ['className' => 'App\Model\Table\RecurringTransactionsTable'];
        $this->RecurringTransactions = TableRegistry::get('RecurringTransactions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecurringTransactions);

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
