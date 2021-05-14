<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="container">
    <div class="card">
        <center>
            <h4>Category Info</h4>
        </center>
        <div class="card-content">
            <table class="vertical-table">
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <!-- <tr>
                    <th scope="row"><?= __('Del Flg') ?></th>
                    <td><?= h($category->del_flg) ?></td>
                </tr> -->
                <tr>
                    <th scope="row"><?= __('ID') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= date('d.m.Y', strtotime(h($category->created))) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= date('d.m.Y', strtotime(h($category->modified))) ?></td>
                </tr>
            </table>
        </div>
        <div class="card-action">
            <div class="row">
                <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'waves-effect waves-light btn right indigo']) ?>
            </div>
        </div>
    </div>
</div>

<style>
    h4 {
        padding-top: 1.2rem;
        margin-bottom: -.5rem;
    }

    .card-action {
        margin-top: -1.8rem;
        margin-bottom: .8rem;
    }

    .container{
        margin-top: 5rem;
    }

    .row {
        margin-bottom: -1rem;
    }

    .card {
        padding-bottom: .1rem;
    }

    th{
        padding-left: 2rem;
    }
</style>