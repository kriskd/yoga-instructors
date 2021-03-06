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
        $this->hasOne('Instructors', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasOne('Studios', [
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
        $validator = $this->validationPasswordSet($validator);
        return $this->validationRequired($validator);
    }

    /**
     * User fields that are always required
     */
    public function validationRequired(Validator $validator) {
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
            ->allowEmpty('phone');

        $validator
            ->add('type', 'inList', ['rule' => ['inList', ['instructor', 'studio']], 'message' => 'Must be instructor or studio'])
            ->notEmpty('type');

        $validator
            ->add('active', 'valid', ['rule' => 'boolean'])
            ->requirePresence('active', 'update')
            ->notEmpty('active');

        return $validator;
    }

    public function validationUserEdit(Validator $validator) {
        $validator = $this->validationRequired($validator);
        $validator = $this->validationPasswordSet($validator);
        $validator = $this->validationOptionalPassword($validator);
        $validator->requirePresence('admin', false);
        $validator->requirePresence('active', false);

        return $validator;
    }

    /**
     * Require password and passowrd_confirm
     * Makre sure they match
     */
    public function validationPasswordSet(Validator $validator) {
        $validator
            ->add('password_confirm', 'custom', [
                'rule' => function ($value, $context) {
                    if (empty(trim($context['data']['password'])) && empty(trim($context['data']['password_confirm']))) {
                        return true;
                    }
                    return $context['data']['password'] === $context['data']['password_confirm'] ? true : false;
                },
                    'message' => 'Passwords must match'
                ])->notEmpty('password');

        return $validator;
    }

    /**
     * Set password and password_confirm to allow empty in the case of editing
     * user profile and not changing the password
     */
    public function validationOptionalPassword(Validator $validator) {
        $validator
            ->allowEmpty('password')
            ->requirePresence('password', false)
            ->allowEmpty('password_confirm')
            ->requirePresence('password_confirm', false);

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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }

}
