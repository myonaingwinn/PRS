<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Admin Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $del_flg
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $token
 *
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\Option[] $options
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\Question[] $questions
 * @property \App\Model\Entity\Survey[] $surveys
 * @property \App\Model\Entity\User[] $users
 */
class Admin extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token'
    ];
}
