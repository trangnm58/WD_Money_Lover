<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RecurringTransactionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RecurringTransactionsController Test Case
 */
class RecurringTransactionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recurring_transactions',
        'app.customers',
        'app.accounts',
        'app.budgets',
        'app.categorys',
        'app.groups',
        'app.transactions',
        'app.wallets',
        'app.debts',
        'app.events',
        'app.settings',
        'app.units'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
