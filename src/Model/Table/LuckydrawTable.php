<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Luckydraw Model
 *
 * @method \App\Model\Entity\Luckydraw get($primaryKey, $options = [])
 * @method \App\Model\Entity\Luckydraw newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Luckydraw[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Luckydraw|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Luckydraw patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Luckydraw[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Luckydraw findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LuckydrawTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('luckydraw');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('scores', 'create')
            ->notEmpty('scores');

        $validator
            ->requirePresence('color', 'create')
            ->notEmpty('color');

        $validator
            ->allowEmpty('del_flg');

        return $validator;
    }
}
