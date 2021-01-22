<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Address Model
 *
 * @property \App\Model\Table\RestaurantsTable&\Cake\ORM\Association\BelongsTo $Restaurants
 *
 * @method \App\Model\Entity\Addres get($primaryKey, $options = [])
 * @method \App\Model\Entity\Addres newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Addres[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Addres|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Addres saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Addres patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Addres[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Addres findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AddressTable extends Table
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

        $this->setTable('address');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Restaurants', [
            'foreignKey' => 'restaurant_id',
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
            ->scalar('eircode')
            ->maxLength('eircode', 255)
            ->requirePresence('eircode', 'create')
            ->notEmptyString('eircode');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('number')
            ->maxLength('number', 255)
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->scalar('complement')
            ->maxLength('complement', 255)
            ->allowEmptyString('complement');

        $validator
            ->scalar('neighborhood')
            ->maxLength('neighborhood', 255)
            ->requirePresence('neighborhood', 'create')
            ->notEmptyString('neighborhood');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 255)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->scalar('user')
            ->maxLength('user', 255)
            ->allowEmptyString('user');

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
        $rules->add($rules->existsIn(['restaurant_id'], 'Restaurants'));

        return $rules;
    }
}
