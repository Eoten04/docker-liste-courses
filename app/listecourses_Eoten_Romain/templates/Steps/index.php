<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Step> $steps
 */
?>
<div class="steps index content">
    <?= $this->Html->link(__('New Step'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Steps') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('numStep') ?></th>
                    <th><?= $this->Paginator->sort('recipie_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($steps as $step): ?>
                <tr>
                    <td><?= $this->Number->format($step->id) ?></td>
                    <td><?= $this->Number->format($step->numStep) ?></td>
                    <td><?= $step->hasValue('recipy') ? $this->Html->link($step->recipy->name, ['controller' => 'Recipies', 'action' => 'view', $step->recipy->id]) : '' ?></td>
                    <td><?= h($step->created) ?></td>
                    <td><?= h($step->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $step->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $step->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $step->id], ['confirm' => __('Are you sure you want to delete # {0}?', $step->id)]) ?>
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