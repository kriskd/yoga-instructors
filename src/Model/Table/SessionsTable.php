<?php
namespace App\Model\Table;

use App\Model\Entity\Session;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sessions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Spaces
 * @property \Cake\ORM\Association\BelongsTo $Styles
 * @property \Cake\ORM\Association\HasMany $Participants
 */
class SessionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('sessions');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Spaces', [
            'foreignKey' => 'space_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Styles', [
            'foreignKey' => 'style_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Participants', [
            'foreignKey' => 'session_id'
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
            ->add('min_students', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('min_students');

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
            ->requirePresence('start', 'create')
            /*->add('end', 'custom', [
                'rule' => function ($value, $context) {
                    debug($context); exit;
                    $spaceStart = $context['data']['spaces']['start'];
                    $spaceEnd = $context['data']['spaces']['end'];
                    debug($spaceStart);
                    debug($spaceEnd); exit;
                },
                ])*/
            ->notEmpty('start');

        $validator
            ->add('end', 'valid', ['rule' => 'datetime'])
            ->requirePresence('end', 'create')
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
        $rules->add($rules->existsIn(['space_id'], 'Spaces'));
        $rules->add($rules->existsIn(['style_id'], 'Styles'));

        $check = function ($session) {
            $space_id = $session->space_id;
            $space = $this->Spaces->get($space_id);
            return $session->start >= $space->start ? true : false;
        };
        $rules->add($check, [
            'errorField' => 'start',
            //'message' => 'Session must start on '.date_format($space->start, 'M j, Y g:i a'),
            'message' => 'Session must start later than Space start',
        ]);

        return $rules;
    }
}
