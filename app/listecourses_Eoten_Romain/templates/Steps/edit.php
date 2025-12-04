<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Step $step
 * @var string[]|\Cake\Collection\CollectionInterface $recipies
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $step->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $step->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Steps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="steps form content">
            <?= $this->Form->create($step) ?>
            <fieldset>
                <legend><?= __('Edit Step') ?></legend>
                <?php
                    echo $this->Form->control('numStep');
                    echo $this->Form->control('desc');
                    echo $this->Form->control('picture');
                    echo $this->Form->control('recipie_id', ['options' => $recipies]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
