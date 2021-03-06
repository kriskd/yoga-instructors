<?php
namespace App\Model\Table;

use App\Model\Entity\Instructor;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Instructors Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Participants
 */
class InstructorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('instructors');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Participants', [
            'foreignKey' => 'instructor_id'
        ]);
    }

    public function beforeSave($event, $entity, $options) {
        if ($entity->isNew()) {
            $entity->user->type = 'instructor';
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->allowEmpty('bio');

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
        return $rules;
    }

    public function getName($userid) {
        $instructor = $this->find('all', [
            'contain' => ['Users'],
            'fields' => ['first_name'],
            'conditions' => [
                'Users.id' => $userid,
            ],
        ])->first();

        return $instructor->first_name;
    }

    public function getUser($user_id) {
        return $this->Users->get($user_id, [
            'contain' => [
                'Instructors' => [
                    'Participants' => [
                        'Roles',
                        'Sessions' => [
                            'Spaces' => [
                                'Studios',
                            ],
                        ],
                    ],
                ],
            ],
            /*'order' => [
                'Participants.role_id',
                'Sessions.start',
            ]*/
        ]);
    }
}
