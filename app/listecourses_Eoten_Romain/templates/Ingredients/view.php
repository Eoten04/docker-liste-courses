<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient $ingredient
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ingredient'), ['action' => 'edit', $ingredient->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ingredient'), ['action' => 'delete', $ingredient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredient->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ingredients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ingredient'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ingredients view content">
            <h3><?= h($ingredient->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ingredient->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($ingredient->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($ingredient->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($ingredient->name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Picture') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($ingredient->picture)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Recipies') ?></h4>
                <?php if (!empty($ingredient->recipies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('PrepTime') ?></th>
                            <th><?= __('Picture') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($ingredient->recipies as $recipy) : ?>
                        <tr>
                            <td><?= h($recipy->id) ?></td>
                            <td><?= h($recipy->name) ?></td>
                            <td><?= h($recipy->prepTime) ?></td>
                            <td><?= h($recipy->picture) ?></td>
                            <td><?= h($recipy->created) ?></td>
                            <td><?= h($recipy->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Recipies', 'action' => 'view', $recipy->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Recipies', 'action' => 'edit', $recipy->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recipies', 'action' => 'delete', $recipy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipy->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>