<?php
namespace App\Model\Table;

use App\Model\Entity\Space;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Spaces Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Studios
 * @property \Cake\ORM\Association\HasMany $Sessions
 */
class SpacesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('spaces');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Studios', [
            'foreignKey' => 'studio_id'
        ]);
        $this->hasOne('Sessions', [
            'foreignKey' => 'space_id'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('hot_room', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('hot_room');

        $validator
            ->add('max_participants', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('max_participants');

        $validator
            ->add('cost', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('cost');

        $validator
            ->add('donation', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('donation');

        $validator
            ->allowEmpty('description');

        $validator
            ->add('start', 'valid', ['rule' => 'datetime'])
            ->notEmpty('start');

        $validator
            ->add('end', 'custom', [
                'rule' => function ($value, $context) {
                    $start = implode(' ', $context['data']['start']);
                    $start = \DateTime::createFromFormat('m d Y h i a', $start);
                    $end = implode(' ', $value);
                    $end = \DateTime::createFromFormat('m d Y h i a', $end);
                    if ($end > $start) {
                        return true;
                    }
                    return false;
                },
                    'message' => 'End date and time must be later than start date and time.'
            ])
            ->add('end', 'valid', ['rule' => 'datetime'])
            ->notEmpty('end');

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
        $rules->add($rules->existsIn(['studio_id'], 'Studios'));
        return $rules;
    }

    /**
     * `start` is in the future
     */
    public function findFuture(Query $query, array $options) {
        $query->where([
            'Spaces.end >' => new \DateTime,
        ]);
        return $query;
    }

    /**
     * There are no associated Sessions 
     */
    public function findAvailable(Query $query, array $options) {
        $query->leftJoin(
                ['Sessions' => 'sessions'],
                ['Sessions.space_id = Spaces.id']
            );
        $query->where(['Sessions.id IS' => null]);

        return $query;
    }

    /**
     * Space belongs to a Studio
     */
    public function findMine(Query $query, array $options) {
        $query->contain(['Studios'])->where(['Studios.user_id' => $options['userid']]);

        return $query;
    }

    /**
     * Includes Sessions with Styles and Participants associated with a space
     */
    public function findSessions(Query $query, array $options) {
        return $query->contain([
            'Sessions' => [
                'Styles',
                'Participants' => [
                    'conditions' => [
                        'role_id' => 1,
                    ],
                    'Instructors',
                ]
            ]
        ]);
    }

    public function findInstructor(Query $query, array $options) {

    }

    /**
     * Get Spaces with associated Session
     */
    public function findBooked(Query $query, array $options) {
        $query->contain([
            'Studios',
            'Sessions' => [
                'Styles',
                'Participants' => [
                    'conditions' => [
                        'role_id' => 1,
                    ],
                    'Instructors',
                ]
            ]
        ]);

        return $query;
    }
}
