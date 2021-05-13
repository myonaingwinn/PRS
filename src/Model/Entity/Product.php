<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $model_no
 * @property string $name
 * @property int $company_id
 * @property int $category_id
 * @property string $price
 * @property string $image
 * @property string $video
 * @property string $del_flg
 * @property int $admin_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $description
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\Answer[] $answers
 * @property \App\Model\Entity\Survey[] $surveys
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
        '*' => true,
        'id' => false
    ];
}
