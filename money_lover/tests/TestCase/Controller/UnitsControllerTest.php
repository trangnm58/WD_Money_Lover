<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UnitsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UnitsController Test Case
 */
class UnitsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.units',
        'app.recurring_transactions',
        'app.customers',
        'app.accounts',
        'app.wallets',
        'app.budgets',
        'app.categorys',
        'app.groups',
        'app.transactions',
        'app.events',
        'app.debts',
        'app.settings'
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