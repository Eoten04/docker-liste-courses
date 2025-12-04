<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IngredientsRecipy Entity
 *
 * @property int $id
 * @property int $recipie_id
 * @property int $ingredient_id
 * @property int $quantity
 * @property string $unity
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Recipy $recipy
 * @property \App\Model\Entity\Ingredient $ingredient
 */
class IngredientsRecipy extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'recipie_id' => true,
        'ingredient_id' => true,
        'quantity' => true,
        'unity' => true,
        'created' => true,
        'modified' => true,
        'recipy' => true,
        'ingredient' => true,
    ];
}
