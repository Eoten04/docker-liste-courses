<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Steps Model
 *
 * @property \App\Model\Table\RecipiesTable&\Cake\ORM\Association\BelongsTo $Recipies
 *
 * @method \App\Model\Entity\Step newEmptyEntity()
 * @method \App\Model\Entity\Step newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Step> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Step get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Step findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Step patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Step> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Step|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Step saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Step>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Step>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Step>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Step> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Step>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Step>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Step>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Step> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StepsTable extends Table
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

        $this->setTable('steps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Recipies', [
            'foreignKey' => 'recipie_id',
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
            ->integer('numStep')
            ->requirePresence('numStep', 'create')
            ->notEmptyString('numStep');

        $validator
            ->scalar('desc')
            ->requirePresence('desc', 'create')
            ->notEmptyString('desc');

        $validator
            ->scalar('picture')
            ->requirePresence('picture', 'create')
            ->notEmptyString('picture');

        $validator
            ->integer('recipie_id')
            ->notEmptyString('recipie_id');

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
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->existsIn(['recipie_id'], 'Recipies'), ['errorField' => 'recipie_id']);

        return $rules;
    }
}
