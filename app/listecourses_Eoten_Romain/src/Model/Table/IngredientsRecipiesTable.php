<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IngredientsRecipies Model
 *
 * @property \App\Model\Table\RecipiesTable&\Cake\ORM\Association\BelongsTo $Recipies
 * @property \App\Model\Table\IngredientsTable&\Cake\ORM\Association\BelongsTo $Ingredients
 *
 * @method \App\Model\Entity\IngredientsRecipy newEmptyEntity()
 * @method \App\Model\Entity\IngredientsRecipy newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\IngredientsRecipy> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IngredientsRecipy get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\IngredientsRecipy findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\IngredientsRecipy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\IngredientsRecipy> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\IngredientsRecipy|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\IngredientsRecipy saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\IngredientsRecipy>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IngredientsRecipy>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\IngredientsRecipy>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IngredientsRecipy> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\IngredientsRecipy>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IngredientsRecipy>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\IngredientsRecipy>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IngredientsRecipy> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IngredientsRecipiesTable extends Table
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

        $this->setTable('ingredients_recipies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Recipies', [
            'foreignKey' => 'recipie_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Ingredients', [
            'foreignKey' => 'ingredient_id',
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
            ->integer('recipie_id')
            ->notEmptyString('recipie_id');

        $validator
            ->integer('ingredient_id')
            ->notEmptyString('ingredient_id');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->scalar('unity')
            ->requirePresence('unity', 'create')
            ->notEmptyString('unity');

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
        $rules->add($rules->existsIn(['ingredient_id'], 'Ingredients'), ['errorField' => 'ingredient_id']);

        return $rules;
    }
}
