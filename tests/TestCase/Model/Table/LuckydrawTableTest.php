<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LuckydrawTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LuckydrawTable Test Case
 */
class LuckydrawTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LuckydrawTable
     */
    public $Luckydraw;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.luckydraw'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Luckydraw') ? [] : ['className' => LuckydrawTable::class];
        $this->Luckydraw = TableRegistry::get('Luckydraw', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Luckydraw);

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
}
