<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipy $recipy
 * @var string[]|\Cake\Collection\CollectionInterface $ingredients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recipy->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recipy->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Recipies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="recipies form content">
            <?= $this->Form->create($recipy) ?>
            <fieldset>
                <legend><?= __('Edit Recipy') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('prepTime');
                    echo $this->Form->control('picture');
                    echo $this->Form->control('ingredients._ids', ['options' => $ingredients]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
