<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CategorysController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CategorysController Test Case
 */
class CategorysControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categorys',
        'app.groups',
        'app.customers',
        'app.accounts',
        'app.wallets',
        'app.budgets',
        'app.debts',
        'app.events',
        'app.recurring_transactions',
        'app.settings',
        'app.transactions'
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