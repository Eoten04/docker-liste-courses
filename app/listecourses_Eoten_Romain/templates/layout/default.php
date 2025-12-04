
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap', 'slick.min.css','slick-theme.min.css', 'slick-theme', 'font-awesome.min', 'style', 'responsive']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>

<div class="main_body_content">
    <div class="hero_area">
        <?= $this->element('partials/header') ?>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>

        <footer>
        </footer>
    <?= $this->Html->script(['jquery','bootstrap','slick.min', 'custom']) ?>
        <?= $this->fetch('script') ?>

</body>
</html>
