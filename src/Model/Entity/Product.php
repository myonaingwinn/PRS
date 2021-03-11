<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string|null $product_model_no
 * @property string $product_name
 * @property int|null $company_id
 * @property int|null $category_id
 * @property string $product_price
 * @property string|null $product_image
 * @property string|null $product_video
 * @property string $del_flg
 * @property int $admin_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Product extends Entity
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
        'product_model_no' => true,
        'product_name' => true,
        'company_id' => true,
        'category_id' => true,
        'product_price' => true,
        'product_image' => true,
        'product_video' => true,
        'del_flg' => true,
        'admin_id' => true,
        'created' => true,
        'modified' => true,
    ];
}
