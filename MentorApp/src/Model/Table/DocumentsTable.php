<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class DocumentsTable extends Table
{

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('documents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Dossiers', [
            'foreignKey' => 'dossier_id',
            'joinType' => 'INNER',
        ]);
        
    }


    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('dossier_id')
            ->notEmptyString('dossier_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('path')
            ->maxLength('path', 255)
            ->requirePresence('path', 'create')
            ->notEmptyString('path');

        return $validator;
    }


    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['dossier_id'], 'Dossiers'), ['errorField' => 'dossier_id']);

        return $rules;
    }
}
