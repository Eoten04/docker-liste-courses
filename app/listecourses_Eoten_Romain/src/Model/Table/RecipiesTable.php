<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recipies Model
 *
 * @property \App\Model\Table\IngredientsTable&\Cake\ORM\Association\BelongsToMany $Ingredients
 *
 * @method \App\Model\Entity\Recipy newEmptyEntity()
 * @method \App\Model\Entity\Recipy newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Recipy> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recipy get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Recipy findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Recipy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Recipy> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recipy|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Recipy saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Recipy>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipy>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recipy>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipy> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recipy>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipy>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recipy>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipy> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RecipiesTable extends Table
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

        $this->setTable('recipies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Ingredients', [
            'foreignKey' => 'recipy_id',
            'targetForeignKey' => 'ingredient_id',
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
            ->integer('prepTime')
            ->requirePresence('prepTime', 'create')
            ->notEmptyString('prepTime');

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
