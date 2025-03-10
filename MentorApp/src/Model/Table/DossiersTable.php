<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class DossiersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('dossiers');
        $this->setPrimaryKey('id');  
        $this->belongsTo('Bedrijven', [
            'className' => 'Bedrijven',
            'foreignKey' => 'bedrijf_id',
            'joinType' => 'LEFT', 
        ]);

        $this->hasMany('Dagboek', [
            'foreignKey' => 'dossier_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        return $validator;
    }
}
