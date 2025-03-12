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

        // Naam database tabel
        $this->setTable('gebruikers');

        // Primaire key
        $this->setPrimaryKey('id');

        // Relatie: Elke gebruiker behoort tot één bedrijf
        $this->belongsTo('Bedrijven', [
            'foreignKey' => 'bedrijf_id',
            'joinType' => 'LEFT', // LEFT JOIN zodat een gebruiker geen bedrijf kan hebben
        ]);

        // Timestamp-behavior toevoegen (voegt automatisch created & modified velden toe)
        $this->addBehavior('Timestamp');
    }

    // Voor het opslaan: controleer of het wachtwoord gewijzigd is en hash het zo nodig
    public function beforeSave(EventInterface $event, $entity, ArrayObject $options)
    {
        if ($entity->isDirty('wachtwoord')) { 
            // Controleer of het wachtwoord al gehasht is
            if (!password_get_info((string)$entity->wachtwoord)['algo']) {
                $entity->wachtwoord = (new DefaultPasswordHasher())->hash($entity->wachtwoord);
            }
        }
    }
}
