<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class GebruikersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('gebruikers');
        $this->setPrimaryKey('id');
        $this->belongsTo('Bedrijven', [
            'foreignKey' => 'bedrijf_id',
            'joinType' => 'LEFT', 
        ]);

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('naam', 'Naam is required')
            ->notEmptyString('email', 'Email is required')
            ->lengthBetween('naam', [5, 255], 'Naam must be between 5 and 255 characters')
            ->email('email', false, 'Invalid email format')
            ->notEmptyString('wachtwoord', 'Password is required');

        return $validator;
    }
}

