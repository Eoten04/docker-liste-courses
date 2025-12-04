<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ingredients Model
 *
 * @property \App\Model\Table\RecipiesTable&\Cake\ORM\Association\BelongsToMany $Recipies
 *
 * @method \App\Model\Entity\Ingredient newEmptyEntity()
 * @method \App\Model\Entity\Ingredient newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ingredient> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ingredient get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ingredient findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ingredient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ingredient> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ingredient|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ingredient saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ingredient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ingredient>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ingredient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ingredient> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ingredient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ingredient>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ingredient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ingredient> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IngredientsTable extends Table
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

        $this->setTable('ingredients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Recipies', [
            'foreignKey' => 'ingredient_id',
            'targetForeignKey' => 'recipy_id',
            'joinTable' => 'ingredients_recipies',
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('picture')
            ->requirePresence('picture', 'create')
            ->notEmptyString('picture');

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

        return $rules;
    }
}
