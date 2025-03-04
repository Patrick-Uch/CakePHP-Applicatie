<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Taken Model
 *
 * @property \App\Model\Table\DossiersTable&\Cake\ORM\Association\BelongsTo $Dossiers
 * @property \App\Model\Table\GebruikersTable&\Cake\ORM\Association\BelongsTo $Gebruikers
 *
 * @method \App\Model\Entity\Taken newEmptyEntity()
 * @method \App\Model\Entity\Taken newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Taken> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Taken get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Taken findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Taken patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Taken> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Taken|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Taken saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Taken>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Taken>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Taken>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Taken> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Taken>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Taken>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Taken>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Taken> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TakenTable extends Table
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

        $this->setTable('taken');
        $this->setDisplayField('titel');
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
            ->scalar('titel')
            ->maxLength('titel', 255)
            ->requirePresence('titel', 'create')
            ->notEmptyString('titel');

        $validator
            ->scalar('beschrijving')
            ->requirePresence('beschrijving', 'create')
            ->notEmptyString('beschrijving');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->date('deadline')
            ->requirePresence('deadline', 'create')
            ->notEmptyDate('deadline');

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
