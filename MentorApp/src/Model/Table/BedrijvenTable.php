<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class BedrijvenTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('bedrijven'); 
        $this->setPrimaryKey('id');

        $this->hasMany('Dossiers', [
            'foreignKey' => 'bedrijf_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->notEmptyString('naam', 'Naam is required');
        return $validator;
    }
}
