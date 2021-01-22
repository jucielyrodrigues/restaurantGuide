<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddressTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddressTable Test Case
 */
class AddressTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AddressTable
     */
    public $Address;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Address',
        'app.Restaurants',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Address') ? [] : ['className' => AddressTable::class];
        $this->Address = TableRegistry::getTableLocator()->get('Address', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Address);

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
