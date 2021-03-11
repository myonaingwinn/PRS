<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property string $question_type
 * @property string $question_description
 * @property string $del_flg
 * @property int $admin_id
 * @property int $survey_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\Survey $survey
 * @property \App\Model\Entity\Answer[] $answers
 * @property \App\Model\Entity\Option[] $options
 */
class Question extends Entity
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
        'question_type' => true,
        'question_description' => true,
        'del_flg' => true,
        'admin_id' => true,
        'survey_id' => true,
        'created' => true,
        'modified' => true,
        'admin' => true,
        'survey' => true,
        'answers' => true,
        'options' => true,
    ];
}
