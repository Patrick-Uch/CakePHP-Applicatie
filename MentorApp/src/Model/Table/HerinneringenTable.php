<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Herinneringen Model
 *
 * @property \App\Model\Table\DossiersTable&\Cake\ORM\Association\BelongsTo $Dossiers
 * @property \App\Model\Table\GebruikersTable&\Cake\ORM\Association\BelongsTo $Gebruikers
 *
 * @method \App\Model\Entity\Herinneringen newEmptyEntity()
 * @method \App\Model\Entity\Herinneringen newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Herinneringen> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Herinneringen get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Herinneringen findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Herinneringen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Herinneringen> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Herinneringen|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Herinneringen saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Herinneringen>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Herinneringen>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Herinneringen>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Herinneringen> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Herinneringen>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Herinneringen>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Herinneringen>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Herinneringen> deleteManyOrFail(iterable $entities, array $options = [])
 */
class HerinneringenTable extends Table
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

        $this->setTable('herinneringen');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Dossiers', [
            'foreignKey' => 'dossier_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Gebruikers', [
            'foreignKey' => 'gebruiker_id',
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
            ->allowEmptyString('gebruiker_id');

        $validator
            ->scalar('bericht')
            ->requirePresence('bericht', 'create')
            ->notEmptyString('bericht');

        $validator
            ->dateTime('herinneringsdatum')
            ->requirePresence('herinneringsdatum', 'create')
            ->notEmptyDateTime('herinneringsdatum');

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
