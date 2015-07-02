<?php
namespace App\Model\Table;

use App\Model\Entity\Studio;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Studios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $States
 * @property \Cake\ORM\Association\HasMany $Spaces
 */
class StudiosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('studios');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Spaces', [
            'foreignKey' => 'studio_id'
        ]);
    }

    public function beforeSave($event, $entity, $options) {
        if ($entity->isNew()) {
            $entity->user->type = 'studio';
        }
        return true;
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->requirePresence('state_id', 'create')
            ->notEmpty('state_id');

        $validator
            ->requirePresence('postal_code', 'create')
            ->notEmpty('postal_code');

        $validator
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        return $rules;
    }
 
    public function getName($userid) {
        $instructor = $this->find('all', [
            'contain' => ['Users'],
            'fields' => ['name'],
            'conditions' => [
                'Users.id' => $userid,
            ],
        ])->first();

        return $instructor->name;
    }
}
