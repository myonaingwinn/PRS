<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Survey Entity
 *
 * @property int $id
 * @property int|null $product_id
 * @property int $category_id
 * @property string $del_flg
 * @property int|null $admin_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\Answer[] $answers
 * @property \App\Model\Entity\Option[] $options
 * @property \App\Model\Entity\Question[] $questions
 */
class Survey extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product_id' => true,
        'category_id' => true,
        'del_flg' => true,
        'admin_id' => true,
        'created' => true,
        'modified' => true,
        'product' => true,
        'category' => true,
        'admin' => true,
        'answers' => true,
        'options' => true,
        'questions' => true,
        
    ];
}
