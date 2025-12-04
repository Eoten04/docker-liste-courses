<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IngredientsRecipy $ingredientsRecipy
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ingredients Recipy'), ['action' => 'edit', $ingredientsRecipy->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ingredients Recipy'), ['action' => 'delete', $ingredientsRecipy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredientsRecipy->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ingredients Recipies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ingredients Recipy'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ingredientsRecipies view content">
            <h3><?= h($ingredientsRecipy->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Recipy') ?></th>
                    <td><?= $ingredientsRecipy->hasValue('recipy') ? $this->Html->link($ingredientsRecipy->recipy->name, ['controller' => 'Recipies', 'action' => 'view', $ingredientsRecipy->recipy->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Ingredient') ?></th>
                    <td><?= $ingredientsRecipy->hasValue('ingredient') ? $this->Html->link($ingredientsRecipy->ingredient->name, ['controller' => 'Ingredients', 'action' => 'view', $ingredientsRecipy->ingredient->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ingredientsRecipy->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($ingredientsRecipy->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($ingredientsRecipy->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($ingredientsRecipy->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Unity') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($ingredientsRecipy->unity)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>