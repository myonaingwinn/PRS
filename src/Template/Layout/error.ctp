<?= $this->Html->charset() ?>
<title>
    <?= $this->fetch('title') ?>
</title>
<?= $this->Html->meta('icon') ?>

<?= $this->Html->css('materialize.min.css') ?>
<!-- <?= $this->Html->css('base.css') ?> -->
<?= $this->Html->css('cake.css') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

<div class="container">
    <div class="row">
        <div id="header">
            <h1><?= __('Error') ?></h1>
        </div>
        <div id="content">
            <?= $this->fetch('content') ?>
        </div>
        <div id="footer">
            <?= $this->Html->link(__('Back'), 'javascript:history.back()', ['class' => 'btn waves-effect waves-light indigo right']) ?>
        </div>
    </div>
</div>

<style>
    html {
        background-color: #ECEFF1;
        font-family: 'Raleway', "Open Sans";
    }

    div#content {
        margin-bottom: 2rem;
    }

    .container {
        margin-top: 2rem;
    }
</style>