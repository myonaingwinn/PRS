<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Answer Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property int $product_id
 * @property int $survey_id
 * @property int $question_id
 * @property int $option_id
 * @property string $answer
 * @property string $remark
 * @property int $rating
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Survey $survey
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\Option $option
 */
class Answer extends Entity
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
