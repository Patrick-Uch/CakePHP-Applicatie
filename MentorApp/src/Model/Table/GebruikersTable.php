<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\DefaultPasswordHasher;
use Cake\Event\EventInterface;
use ArrayObject;

class GebruikersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('gebruikers');
        $this->setPrimaryKey('id');
        $this->belongsTo('Bedrijven', [
            'foreignKey' => 'bedrijf_id',
            'joinType' => 'INNER', 
        ]);

        $this->addBehavior('Timestamp');
    }

    // Custom finder voor authenticatie
    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        return $query->select(['id', 'bedrijf_id', 'naam', 'email', 'wachtwoord'])
                     ->contain(['Bedrijven']); // Zorg ervoor dat bedrijf_id altijd beschikbaar is
    }

    public function beforeSave(EventInterface $event, $entity, ArrayObject $options)
    {
        if ($entity->isDirty('wachtwoord')) { 
            if (!password_get_info((string)$entity->wachtwoord)['algo']) {
                $entity->wachtwoord = (new DefaultPasswordHasher())->hash($entity->wachtwoord);
            }
        }
    }
}
