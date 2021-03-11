<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property &\Cake\ORM\Association\BelongsTo $Companies
 * @property &\Cake\ORM\Association\BelongsTo $Categories
 * @property &\Cake\ORM\Association\BelongsTo $Admins
 * @property &\Cake\ORM\Association\HasMany $Answers
 * @property &\Cake\ORM\Association\HasMany $Surveys
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
        ]);
        $this->belongsTo('Admins', [
            'foreignKey' => 'admin_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Answers', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('Surveys', [
            'foreignKey' => 'product_id',
        ]);
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('product_model_no')
            ->maxLength('product_model_no', 100)
            ->allowEmptyString('product_model_no');

        $validator
            ->scalar('product_name')
            ->maxLength('product_name', 100)
            ->requirePresence('product_name', 'create')
            ->notEmptyString('product_name');

        $validator
            ->scalar('product_price')
            ->maxLength('product_price', 50)
            ->requirePresence('product_price', 'create')
            ->notEmptyString('product_price');

        $validator
            ->scalar('product_image')
            ->maxLength('product_image', 500)
            ->allowEmptyFile('product_image');

        $validator
            ->scalar('product_video')
            ->maxLength('product_video', 500)
            ->allowEmptyString('product_video');

        $validator
            ->scalar('del_flg')
            ->notEmptyString('del_flg');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['admin_id'], 'Admins'));

        return $rules;
    }
}
