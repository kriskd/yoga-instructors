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
        $this->hasMany('Sessions', [
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
            ->allowEmpty('start');
            
        $validator
            ->add('end', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('end');

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
}
