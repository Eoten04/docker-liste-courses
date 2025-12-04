<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <?=
                $this->Html->link(
                    'Listes de courses',
                    [
                        'controller' => 'recipies',
                        'action' => 'index',
                    ],
                    [
                        'class' => 'navbar-brand',
                    ]
                )
            ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
<!--                    <li class="nav-item ">-->
<!--                        --><?php //=
//                            $this->Html->link(
//                                'Accueil <span class="sr-only">(current)</span>',
//                                [
//                                    'controller' => 'recipies',
//                                    'action' => 'index',
//                                ],
//                                [
//                                    'class' => 'nav-link',
//                                    'escapeTitle' => false,
//                                ]
//                            )
?>
<!--                    </li>-->
                    <li class="nav-item">
                        <?=
                            $this->Html->link(
                                'Recettes',
                                [
                                    'controller' => 'recipies',
                                    'action' => 'listing',
                                ],
                                [
                                    'class' => 'nav-link',
                                ]
                            )
                            ?>
                    </li>
                </ul>
                <div class="quote_btn-container">
                    <?=
                        $this->Form->create()
                        .
                        $this->Form->button(
                            '<i class="fa fa-search" aria-hidden="true"></i>',
                            [
                                'class' => 'btn  my-2 my-sm-0 nav_search-btn',
                                'escapeTitle' => false,
                            ]
                        )
                        .
                        $this->Form->end();
                        ?>
                    <?=
                        $this->Html->link(
                            '<i class="fa fa-user" aria-hidden="true"></i>',
                            [
                                'controller' => 'users',
                                'action' => 'login',
                            ],
                            [
                                'escapeTitle' => false,
                            ]
                        )
                        ?>
                </div>
            </div>
        </nav>
    </div>
</header>
