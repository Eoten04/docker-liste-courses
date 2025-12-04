<?php


$this->assign('title', __('Connexion'));
?>

<div class="content-header row">
</div>
<div class="content-body">
    <section id="account-login" class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0 text-center d-none d-md-block">
                <div class="border-grey border-lighten-3 m-0 box-shadow-0 card-account-left height-400">
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0">
                <div class="card border-grey border-lighten-3 m-0 box-shadow-0 card-account-right height-400">
                    <div class="card-content">
                        <div class="card-body p-3">
                            <p class="text-center h5 text-capitalize">Formulaire de connexion</p>
                            <p class="mb-3 text-center">Connectez-vous</p>

                            <?=
                            /** @var \App\Model\Entity\User $user */
                            $this->Form->create(
                                $user,
                                [
                                    'type' => 'file',
                                    'class' => 'form-horizontal form-signin',
                                ]
                            );
                            ?>
                            <fieldset class="form-label-group">
                                <?=
                                $this->Form->control(
                                    'email',
                                    [
                                        'label' => 'Adresse email',
                                        'class' => 'form-control',
                                        'placeholder' => 'Votre adresse  email',
                                        'autofocus' => true,

                                    ]
                                );
                                ?>
                            </fieldset>
                            <fieldset class="form-label-group">
                                <?=
                                $this->Form->control('password', [
                                    'type' => 'password',
                                    'label' => 'Mot de passe',
                                    'class' => 'form-control',
                                    'placeholder' => 'Votre mot de passe',
                                ])
                                ?>
                            </fieldset>
                            <?=
                            $this->Form->button('Se connecter', [
                                'class' => 'btn-gradient-primary btn-block my-1',
                            ])
                            ?>
                            <p class="text-center">
                                <?= $this->Html->link("S'inscrire", ['controller' => 'Users', 'action' => 'add']) ?>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
