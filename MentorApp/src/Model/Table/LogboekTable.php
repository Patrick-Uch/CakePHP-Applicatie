<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class LogboekTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('logboek');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Dossiers', [
            'foreignKey' => 'dossier_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Gebruikers', [
            'foreignKey' => 'gebruiker_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('dossier_id');

        $validator
            ->notEmptyString('gebruiker_id');

        $validator
            ->scalar('actie')
            ->requirePresence('actie', 'create')
            ->notEmptyString('actie');

        $validator
            ->dateTime('gemaakt_op')
            ->notEmptyDateTime('gemaakt_op');

        $validator
            ->dateTime('geupdate_op')
            ->notEmptyDateTime('geupdate_op');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['dossier_id'], 'Dossiers'), ['errorField' => 'dossier_id']);
        $rules->add($rules->existsIn(['gebruiker_id'], 'Gebruikers'), ['errorField' => 'gebruiker_id']);

        return $rules;
    }
}
