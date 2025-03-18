<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class LogboekTable extends Table
{
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

        $this->addBehavior('Timestamp');
    }

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
            ->scalar('beschrijving')
            ->requirePresence('beschrijving', 'create')
            ->notEmptyString('beschrijving');
        
        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['dossier_id'], 'Dossiers'), ['errorField' => 'dossier_id']);
        $rules->add($rules->existsIn(['gebruiker_id'], 'Gebruikers'), ['errorField' => 'gebruiker_id']);

        return $rules;
    }
}
