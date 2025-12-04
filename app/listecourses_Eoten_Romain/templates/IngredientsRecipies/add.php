<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IngredientsRecipy $ingredientsRecipy
 * @var \Cake\Collection\CollectionInterface|string[] $recipies
 * @var \Cake\Collection\CollectionInterface|string[] $ingredients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ingredients Recipies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ingredientsRecipies form content">
            <?= $this->Form->create($ingredientsRecipy) ?>
            <fieldset>
                <legend><?= __('Add Ingredients Recipy') ?></legend>
                <?php
                    echo $this->Form->control('recipie_id', ['options' => $recipies]);
                    echo $this->Form->control('ingredient_id', ['options' => $ingredients]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('unity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
