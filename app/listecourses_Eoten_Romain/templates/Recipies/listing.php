<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipy $recipies
 */
$recipies = $recipies->toArray();
?>
<!--<div class="row">-->
<!--    <aside class="column">-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('Edit Recipy'), ['action' => 'edit', $recipy->id], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Form->postLink(__('Delete Recipy'), ['action' => 'delete', $recipy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipy->id), 'class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('List Recipies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('New Recipy'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
    <section class="chocolate_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>Nos délicieuses recettes</h2>
                <p>Retrouvez ici nos superbes recettes</p>
            </div>

            <div class="container">
                <?php foreach (array_chunk($recipies, 3) as $row): ?>
                    <div class="row">
                        <?php foreach ($row as $recipie): ?>
                            <div class="col-md-4">
                                <div class="box">
                                    <div class="img-box">
                                        <?= $this->Html->image($recipie->picture, ['alt' => $recipie->name]) ?>
                                    </div>
                                    <div class="detail-box">
                                        <h6><?= $recipie->name ?></h6>
                                        <h5><?= $recipie->prepTime ?></h5>
                                        <?= $this->Html->link('Voir la recette', ['controller' => 'recipies', 'action' => 'view', $recipie->id]) ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<!--</div>-->
<!--            <h3>--><?php //= h($recipy->name) ?><!--</h3>-->
<!--            <table>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Id') ?><!--</th>-->
<!--                    <td>--><?php //= $this->Number->format($recipy->id) ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('PrepTime') ?><!--</th>-->
<!--                    <td>--><?php //= $this->Number->format($recipy->prepTime) ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Created') ?><!--</th>-->
<!--                    <td>--><?php //= h($recipy->created) ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Modified') ?><!--</th>-->
<!--                    <td>--><?php //= h($recipy->modified) ?><!--</td>-->
<!--                </tr>-->
<!--            </table>-->
<!--            <div class="text">-->
<!--                <strong>--><?php //= __('Name') ?><!--</strong>-->
<!--                <blockquote>-->
<!--                    --><?php //= $this->Text->autoParagraph(h($recipy->name)); ?>
<!--                </blockquote>-->
<!--            </div>-->
<!--            <div class="text">-->
<!--                <strong>--><?php //= __('Picture') ?><!--</strong>-->
<!--                <blockquote>-->
<!--                    --><?php //= $this->Text->autoParagraph(h($recipy->picture)); ?>
<!--                </blockquote>-->
<!--            </div>-->
<!--            <div class="related">-->
<!--                <h4>--><?php //= __('Related Ingredients') ?><!--</h4>-->
<!--                --><?php //if (!empty($recipy->ingredients)) : ?>
<!--                <div class="table-responsive">-->
<!--                    <table>-->
<!--                        <tr>-->
<!--                            <th>--><?php //= __('Id') ?><!--</th>-->
<!--                            <th>--><?php //= __('Name') ?><!--</th>-->
<!--                            <th>--><?php //= __('Picture') ?><!--</th>-->
<!--                            <th>--><?php //= __('Created') ?><!--</th>-->
<!--                            <th>--><?php //= __('Modified') ?><!--</th>-->
<!--                            <th class="actions">--><?php //= __('Actions') ?><!--</th>-->
<!--                        </tr>-->
<!--                        --><?php //foreach ($recipy->ingredients as $ingredient) : ?>
<!--                        <tr>-->
<!--                            <td>--><?php //= h($ingredient->id) ?><!--</td>-->
<!--                            <td>--><?php //= h($ingredient->name) ?><!--</td>-->
<!--                            <td>--><?php //= h($ingredient->picture) ?><!--</td>-->
<!--                            <td>--><?php //= h($ingredient->created) ?><!--</td>-->
<!--                            <td>--><?php //= h($ingredient->modified) ?><!--</td>-->
<!--                            <td class="actions">-->
<!--                                --><?php //= $this->Html->link(__('View'), ['controller' => 'Ingredients', 'action' => 'view', $ingredient->id]) ?>
<!--                                --><?php //= $this->Html->link(__('Edit'), ['controller' => 'Ingredients', 'action' => 'edit', $ingredient->id]) ?>
<!--                                --><?php //= $this->Form->postLink(__('Delete'), ['controller' => 'Ingredients', 'action' => 'delete', $ingredient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredient->id)]) ?>
<!--                            </td>-->
<!--                        </tr>-->
<!--                        --><?php //endforeach; ?>
<!--                    </table>-->
<!--                </div>-->
<!--                --><?php //endif; ?>
