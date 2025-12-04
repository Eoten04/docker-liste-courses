<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Recipy> $recipies
 */
?>

<section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail_box">
                                <h1>
                                    Chocolate <br>
                                    <span>
                          Yummy
                        </span>
                                </h1>
                                <a href="#">
                        <span>
                          Read More
                        </span>
                                    <img src="images/white-arrow.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="img-box">
                                <img src="images/slider-img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail_box">
                                <h1>
                                    Chocolate <br>
                                    <span>
                          Yummy
                        </span>
                                </h1>
                                <a href="#">
                        <span>
                          Read More
                        </span>
                                    <img src="images/white-arrow.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="img-box">
                                <img src="images/slider-img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail_box">
                                <h1>
                                    Chocolate <br>
                                    <span>
                          Yummy
                        </span>
                                </h1>
                                <a href="#">
                        <span>
                          Read More
                        </span>
                                    <img src="images/white-arrow.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="img-box">
                                <img src="images/slider-img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel_btn-box">
        <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<!-- end slider section -->
</div>

<section class="chocolate_section ">
    <div class="container">
        <div class="heading_container">
            <h2>
                Our chocolate products
            </h2>
            <p>
                Many desktop publishing packages and web pagend web page editors now use Lorem Ipsum as their
            </p>
        </div>
    </div>
    <div class="container">
        <div class="chocolate_container">
            <?php foreach ($recipies as $recipie): ?>
            <div class="box">
                <div class="img-box">
                    <?= $this->Html->image("images/chocolate1.png") ?>
                </div>
                <div class="detail-box">
                    <h6><?= $recipie->name ?></h6>
                    <h5><?= $recipie->prepTime ?></h5>
                    <?= $this->Html->link('Voir la recette', ['controller' => 'recipies', 'action' => 'view', $recipie->id]) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--<div class="recipies index content">-->
<!--    --><?php //= $this->Html->link(__('New Recipy'), ['action' => 'add'], ['class' => 'button float-right']) ?>
<!--    <h3>--><?php //= __('Recipies') ?><!--</h3>-->
<!--    <div class="table-responsive">-->
<!--        <table>-->
<!--            <thead>-->
<!--                <tr>-->
<!--                    <th>--><?php //= $this->Paginator->sort('id') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('prepTime') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('created') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('modified') ?><!--</th>-->
<!--                    <th class="actions">--><?php //= __('Actions') ?><!--</th>-->
<!--                </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--                --><?php //foreach ($recipies as $recipy): ?>
<!--                <tr>-->
<!--                    <td>--><?php //= $this->Number->format($recipy->id) ?><!--</td>-->
<!--                    <td>--><?php //= $this->Number->format($recipy->prepTime) ?><!--</td>-->
<!--                    <td>--><?php //= h($recipy->created) ?><!--</td>-->
<!--                    <td>--><?php //= h($recipy->modified) ?><!--</td>-->
<!--                    <td class="actions">-->
<!--                        --><?php //= $this->Html->link(__('View'), ['action' => 'view', $recipy->id]) ?>
<!--                        --><?php //= $this->Html->link(__('Edit'), ['action' => 'edit', $recipy->id]) ?>
<!--                        --><?php //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recipy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipy->id)]) ?>
<!--                    </td>-->
<!--                </tr>-->
<!--                --><?php //endforeach; ?>
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->
<!--    <div class="paginator">-->
<!--        <ul class="pagination">-->
<!--            --><?php //= $this->Paginator->first('<< ' . __('first')) ?>
<!--            --><?php //= $this->Paginator->prev('< ' . __('previous')) ?>
<!--            --><?php //= $this->Paginator->numbers() ?>
<!--            --><?php //= $this->Paginator->next(__('next') . ' >') ?>
<!--            --><?php //= $this->Paginator->last(__('last') . ' >>') ?>
<!--        </ul>-->
<!--        <p>--><?php //= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?><!--</p>-->
<!--    </div>-->
<!--</div>-->
