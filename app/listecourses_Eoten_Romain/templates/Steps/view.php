<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Step $step
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Step'), ['action' => 'edit', $step->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Step'), ['action' => 'delete', $step->id], ['confirm' => __('Are you sure you want to delete # {0}?', $step->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Steps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Step'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="steps view content">
            <h3><?= h($step->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Recipy') ?></th>
                    <td><?= $step->hasValue('recipy') ? $this->Html->link($step->recipy->name, ['controller' => 'Recipies', 'action' => 'view', $step->recipy->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($step->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('NumStep') ?></th>
                    <td><?= $this->Number->format($step->numStep) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($step->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($step->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($step->desc)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Picture') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($step->picture)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>