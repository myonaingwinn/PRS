<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LuckydrawFixture
 *
 */
class LuckydrawFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'luckydraw';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'scores' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => 'Again', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'color' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'del_flg' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => 'not', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'scores' => 'Lorem ipsum dolor sit amet',
            'color' => 'Lorem ipsum dolor sit amet',
            'del_flg' => 'Lorem ipsum dolor sit amet',
            'created' => '2021-03-08 07:41:05',
            'modified' => '2021-03-08 07:41:05'
        ],
    ];
}
