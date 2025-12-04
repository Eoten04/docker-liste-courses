<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\IngredientsRecipy> $ingredientsRecipies
 */
?>
<div class="ingredientsRecipies index content">
    <?= $this->Html->link(__('New Ingredients Recipy'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ingredients Recipies') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('recipie_id') ?></th>
                    <th><?= $this->Paginator->sort('ingredient_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ingredientsRecipies as $ingredientsRecipy): ?>
                <tr>
                    <td><?= $this->Number->format($ingredientsRecipy->id) ?></td>
                    <td><?= $ingredientsRecipy->hasValue('recipy') ? $this->Html->link($ingredientsRecipy->recipy->name, ['controller' => 'Recipies', 'action' => 'view', $ingredientsRecipy->recipy->id]) : '' ?></td>
                    <td><?= $ingredientsRecipy->hasValue('ingredient') ? $this->Html->link($ingredientsRecipy->ingredient->name, ['controller' => 'Ingredients', 'action' => 'view', $ingredientsRecipy->ingredient->id]) : '' ?></td>
                    <td><?= $this->Number->format($ingredientsRecipy->quantity) ?></td>
                    <td><?= h($ingredientsRecipy->created) ?></td>
                    <td><?= h($ingredientsRecipy->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ingredientsRecipy->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ingredientsRecipy->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ingredientsRecipy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredientsRecipy->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>