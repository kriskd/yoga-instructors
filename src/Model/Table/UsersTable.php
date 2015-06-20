<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Behavior\TimestampBehavior;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Instructors
 * @property \Cake\ORM\Association\HasMany $Studios
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('Instructors', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Studios', [
            'foreignKey' => 'user_id'
        ]);
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('admin', 'valid', ['rule' => 'boolean'])
            ->requirePresence('admin', 'update')
            ->notEmpty('admin');

        $validator
            ->add('email', 'valid', ['rule' => 'email', 'message' => 'Enter a valid email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->allowEmpty('phone');

        $validator
            ->add('active', 'valid', ['rule' => 'boolean'])
            ->requirePresence('active', 'update')
            ->notEmpty('active');

        $validator
            ->add('password_confirm', 'custom', [
                'rule' => function ($value, $context) {
                    if (!isset($context['data']['password_confirm'])) {
                        return true;
                    }
                    return $context['data']['password'] === $context['data']['password_confirm'] ? true : false;
                },
                    'message' => 'Passwords must match'
                ]);

        return $validator;
    }

    /*public function validationNewUser(Validator $validator) {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->add('type', 'valid', ['rule' => 'boolean'])
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        return $validator;
    }*/

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }

}
