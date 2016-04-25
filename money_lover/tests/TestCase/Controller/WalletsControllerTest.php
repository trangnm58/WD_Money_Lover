<?php
namespace App\Test\TestCase\Controller;

use App\Controller\WalletsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\WalletsController Test Case
 */
class WalletsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wallets',
        'app.accounts',
        'app.budgets',
        'app.categorys',
        'app.groups',
        'app.recurring_transactions',
        'app.units',
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
