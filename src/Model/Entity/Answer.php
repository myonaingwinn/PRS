<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Answer Entity
 *
 * @property int $id
 * @property int|null $product_id
 * @property int $category_id
 * @property int $question_id
 * @property int $survey_id
 * @property int $option_id
 * @property int $user_id
 * @property string $answer
 * @property string $remark
 * @property int $rating
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\Survey $survey
 * @property \App\Model\Entity\Option $option
 * @property \App\Model\Entity\User $user
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
        'product_id' => true,
        'category_id' => true,
        'question_id' => true,
        'survey_id' => true,
        'option_id' => true,
        'user_id' => true,
        'answer' => true,
        'remark' => true,
        'rating' => true,
        'created' => true,
        'product' => true,
        'category' => true,
        'question' => true,
        'survey' => true,
        'option' => true,
        'user' => true,
    ];
}
