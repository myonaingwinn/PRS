<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Survey[]|\Cake\Collection\CollectionInterface $surveys
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Survey'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="surveys index large-9 medium-8 columns content">
    <h3><?= __('Surveys') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('del_flg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('admin_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($surveys as $survey): ?>
            <tr>
                <td><?= $this->Number->format($survey->id) ?></td>
                <td><?= h($survey->name) ?></td>
                <td><?= h($survey->description) ?></td>
                <td><?= $survey->has('product') ? $this->Html->link($survey->product->id, ['controller' => 'Products', 'action' => 'view', $survey->product->id]) : '' ?></td>
                <td><?= $survey->has('category') ? $this->Html->link($survey->category->id, ['controller' => 'Categories', 'action' => 'view', $survey->category->id]) : '' ?></td>
                <td><?= h($survey->del_flg) ?></td>
                <td><?= $survey->has('admin') ? $this->Html->link($survey->admin->admin_id, ['controller' => 'Admins', 'action' => 'view', $survey->admin->admin_id]) : '' ?></td>
                <td><?= h($survey->created) ?></td>
                <td><?= h($survey->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $survey->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $survey->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $survey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $survey->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
