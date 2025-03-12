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

        // Naam database tabel
        $this->setTable('dossiers');

        // Primaire key
        $this->setPrimaryKey('id');  

        // Relatie: Elk dossier behoort tot één bedrijf (bedrijf_id is een buitenlandse sleutel)
        $this->belongsTo('Bedrijven', [
            'className' => 'Bedrijven',
            'foreignKey' => 'bedrijf_id',
            'joinType' => 'LEFT', // LEFT JOIN zodat een dossier geen bedrijf kan hebben
        ]);

        // Relatie: Een dossier kan meerdere dagboek-items hebben
        $this->hasMany('Dagboek', [
            'foreignKey' => 'dossier_id',
            'dependent' => true, // Zorgt ervoor dat gerelateerde dagboek-items worden verwijderd als het dossier wordt verwijderd
            'cascadeCallbacks' => true, // Zorgt ervoor dat de verwijdering correct wordt uitgevoerd met callbacks
        ]);
    }

}
