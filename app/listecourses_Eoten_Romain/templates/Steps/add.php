<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Step $step
 * @var \Cake\Collection\CollectionInterface|string[] $recipies
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Steps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="steps form content">
            <?= $this->Form->create($step) ?>
            <fieldset>
                <legend><?= __('Add Step') ?></legend>
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
