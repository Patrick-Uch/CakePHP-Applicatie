<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;
use Cake\Datasource\EntityInterface;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;


/**
 * Dossiers Model
 *
 * @property \App\Model\Table\DagboekTable&\Cake\ORM\Association\HasMany $Dagboek
 *
 * @method \App\Model\Entity\Dossier newEmptyEntity()
 * @method \App\Model\Entity\Dossier newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Dossier> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dossier get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Dossier findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Dossier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Dossier> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dossier|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Dossier saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Dossier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dossier>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Dossier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dossier> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Dossier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dossier>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Dossier>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dossier> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DossiersTable extends Table
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

        $this->setTable('dossiers');
        $this->setDisplayField('status');
        $this->setPrimaryKey('id');

        $this->belongsTo('Bedrijven', [
            'foreignKey' => 'bedrijf_id',
            'className' => 'Bedrijven',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Dagboek', [
            'foreignKey' => 'dossier_id',
        ]); 
        $this->hasMany('Herinneringen', [
            'foreignKey' => 'dossier_id',
        ]);
        $this->hasMany('Logboek', [
            'foreignKey' => 'dossier_id',
            'dependent' => false,
        ]);
        $this->hasMany('Taken', [
            'foreignKey' => 'dossier_id',
        ]);
        $this->hasMany('Documents', [
            'foreignKey' => 'dossier_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
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
            ->notEmptyString('bedrijf_id');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('naam')
            ->maxLength('naam', 255)
            ->requirePresence('naam', 'create')
            ->notEmptyString('naam');

        $validator
            ->scalar('email_1')
            ->maxLength('email_1', 255)
            ->requirePresence('email_1', 'create')
            ->notEmptyString('email_1');

        $validator
            ->scalar('email_2')
            ->maxLength('email_2', 255)
            ->allowEmptyString('email_2');

        $validator
            ->scalar('telefoonnummer_1')
            ->maxLength('telefoonnummer_1', 20)
            ->requirePresence('telefoonnummer_1', 'create')
            ->notEmptyString('telefoonnummer_1');

        $validator
            ->scalar('telefoonnummer_2')
            ->maxLength('telefoonnummer_2', 20)
            ->allowEmptyString('telefoonnummer_2');

        $validator
            ->scalar('bsn')
            ->maxLength('bsn', 255)
            ->allowEmptyString('bsn'); 
    
        $validator
            ->scalar('iban')
            ->maxLength('iban', 255)
            ->allowEmptyString('iban'); 
    
        $validator
            ->scalar('postadres_straat')
            ->maxLength('postadres_straat', 255)
            ->requirePresence('postadres_straat', 'create')
            ->notEmptyString('postadres_straat');

        $validator
            ->scalar('postadres_huisnummer')
            ->maxLength('postadres_huisnummer', 10)
            ->requirePresence('postadres_huisnummer', 'create')
            ->notEmptyString('postadres_huisnummer');

        $validator
            ->scalar('postadres_toevoeging')
            ->maxLength('postadres_toevoeging', 10)
            ->requirePresence('postadres_toevoeging', 'create')
            ->notEmptyString('postadres_toevoeging');

        $validator
           ->scalar('postadres_postcode')
            ->maxLength('postadres_postcode', 20)
            ->requirePresence('postadres_postcode', 'create')
            ->notEmptyString('postadres_postcode');

        $validator
            ->scalar('postadres_gemeente')
            ->maxLength('postadres_gemeente', 255)
            ->requirePresence('postadres_gemeente', 'create')
            ->notEmptyString('postadres_gemeente');

        $validator
            ->scalar('postadres_provincie')
            ->maxLength('postadres_provincie', 255)
            ->requirePresence('postadres_provincie', 'create')
            ->notEmptyString('postadres_provincie');

        $validator
            ->scalar('bezoekadres_straat')
            ->maxLength('bezoekadres_straat', 255)
            ->requirePresence('bezoekadres_straat', 'create')
            ->notEmptyString('bezoekadres_straat');

        $validator
            ->scalar('bezoekadres_huisnummer')
            ->maxLength('bezoekadres_huisnummer', 10)
            ->requirePresence('bezoekadres_huisnummer', 'create')
            ->notEmptyString('bezoekadres_huisnummer');

        $validator
            ->scalar('bezoekadres_toevoeging')
            ->maxLength('bezoekadres_toevoeging', 10)
            ->requirePresence('bezoekadres_toevoeging', 'create')
            ->notEmptyString('bezoekadres_toevoeging');

        $validator
            ->scalar('bezoekadres_postcode')
            ->maxLength('bezoekadres_postcode', 20)
            ->requirePresence('bezoekadres_postcode', 'create')
            ->notEmptyString('bezoekadres_postcode');

        $validator
            ->scalar('bezoekadres_gemeente')
            ->maxLength('bezoekadres_gemeente', 255)
            ->requirePresence('bezoekadres_gemeente', 'create')
            ->notEmptyString('bezoekadres_gemeente');

        $validator
            ->scalar('bezoekadres_provincie')
            ->maxLength('bezoekadres_provincie', 255)
            ->requirePresence('bezoekadres_provincie', 'create')
            ->notEmptyString('bezoekadres_provincie');

        $validator
            ->scalar('rechtbank')
            ->maxLength('rechtbank', 255)
            ->requirePresence('rechtbank', 'create')
            ->notEmptyString('rechtbank');

        $validator
            ->scalar('mb_cb_nummer')
            ->maxLength('mb_cb_nummer', 20)
            ->requirePresence('mb_cb_nummer', 'create')
            ->notEmptyString('mb_cb_nummer');

        $validator
            ->scalar('betrokkenen_relatie')
            ->maxLength('betrokkenen_relatie', 30)
            ->allowEmptyString('betrokkenen_relatie');

        $validator
            ->scalar('betrokkenen_voor_achternaam')
            ->maxLength('betrokkenen_voor_achternaam', 50)
            ->allowEmptyString('betrokkenen_voor_achternaam');

        $validator
            ->scalar('betrokkenen_telefoonnummer')
            ->maxLength('betrokkenen_telefoonnummer', 20)
            ->allowEmptyString('betrokkenen_telefoonnummer');

        $validator
            ->scalar('betrokkenen_email')
            ->maxLength('betrokkenen_email', 50)
            ->allowEmptyString('betrokkenen_email');

        $validator
            ->scalar('betrokkenen_straat')
            ->maxLength('betrokkenen_straat', 50)
            ->allowEmptyString('betrokkenen_straat');

        $validator
            ->scalar('betrokkenen_huisnummer')
            ->maxLength('betrokkenen_huisnummer', 20)
            ->allowEmptyString('betrokkenen_huisnummer');

        $validator
            ->scalar('betrokkenen_toevoeging')
            ->maxLength('betrokkenen_toevoeging', 20)
            ->allowEmptyString('betrokkenen_toevoeging');

        $validator
            ->scalar('betrokkenen_postcode')
            ->maxLength('betrokkenen_postcode', 20)
            ->allowEmptyString('betrokkenen_postcode');

        $validator
            ->scalar('betrokkenen_gemeente')
            ->maxLength('betrokkenen_gemeente', 255)
            ->allowEmptyString('betrokkenen_gemeente');

        $validator
            ->scalar('encryption_key_id')
            ->maxLength('encryption_key_id', 255)
            ->allowEmptyString('encryption_key_id');

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
        $rules->add($rules->existsIn(['bedrijf_id'], 'Bedrijven'), ['errorField' => 'bedrijf_id']);

        return $rules;
    }

    public function beforeSave(EventInterface $event, EntityInterface $entity, $options)
    {
        if ($entity->isNew()) {
            $entity->gemaakt_op = date('Y-m-d H:i:s');
        }
        $entity->geupdate_op = date('Y-m-d H:i:s');
    }
    

    public function afterSave(EventInterface $event, EntityInterface $entity, $options)
    {
        $logTable = TableRegistry::getTableLocator()->get('Logboek');
        $session = \Cake\Http\ServerRequestFactory::fromGlobals()->getSession();
        $userId = $session->read('Auth.id');
    
        if (!$userId) {
            return;
        }
    
        $beschrijving = '';
        $actie = '';
    
        if ($entity->isNew()) {
            $beschrijving = 'Nieuw dossier aangemaakt: ' . ($entity->naam ?? '[Onbekend]');
            $actie = 'Created';
        } else {
            // Bekijk voor veranderingen
            $changedFields = $entity->getDirty();
            $updates = [];
    
            foreach ($changedFields as $field) {
                // Specifieke afhandeling voor versleutelde velden
                if (in_array($field, ['bsn', 'iban'])) {
                    $updates[] = ucfirst($field) . " gewijzigd van [ENCRYPTED] naar [ENCRYPTED]";
                    continue;
                }
            
                $oldValue = $entity->getOriginal($field);
                $newValue = $entity->get($field);
            
                // Alleen loggen als de waarde is veranderd
                if ($oldValue !== $newValue) {
                    $updates[] = ucfirst($field) . " gewijzigd van '{$oldValue}' naar '{$newValue}'";
                }
            }
            
    
            if (!empty($updates)) {
                $beschrijving = "Dossier bijgewerkt: " . implode(", ", $updates);
                $actie = 'Updated';
            }
        }
    
        $logData = [
            'dossier_id' => $entity->id,
            'gebruiker_id' => $userId,
            'actie' => $actie,
            'beschrijving' => $beschrijving,
            'created_at' => date('Y-m-d H:i:s')
        ];
    
        // Log de actie
        if (!empty($beschrijving)) {
            $logEntity = $logTable->newEntity($logData);
            $logTable->save($logEntity);
        }
    }
    
    public function beforeDelete(EventInterface $event, EntityInterface $entity, $options)
    {
        $logTable = TableRegistry::getTableLocator()->get('Logboek');
        $session = \Cake\Http\ServerRequestFactory::fromGlobals()->getSession();
        $userId = $session->read('Auth.id');
    
        if (!$userId) {
            return;
        }
    
        $logData = [
            'dossier_id' => $entity->id,
            'gebruiker_id' => $userId,
            'actie' => 'Deleted',
            'beschrijving' => 'Dossier verwijderd: ' . ($entity->naam ?? '[Onbekend]'),
            'created_at' => strftime('%Y-%m-%d %H:%M:%S')
        ];
    
        $logEntity = $logTable->newEntity($logData);
        $logTable->save($logEntity);
    }
    
    
}
    
