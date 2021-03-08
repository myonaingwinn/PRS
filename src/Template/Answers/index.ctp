<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Answer[]|\Cake\Collection\CollectionInterface $answers
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Answer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="answers index large-9 medium-8 columns content">
    <h3><?= __('Answers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('survey_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('option_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('answer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remark') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($answers as $answer): ?>
            <tr>
                <td><?= $this->Number->format($answer->id) ?></td>
                <td><?= $answer->has('product') ? $this->Html->link($answer->product->id, ['controller' => 'Products', 'action' => 'view', $answer->product->id]) : '' ?></td>
                <td><?= $answer->has('category') ? $this->Html->link($answer->category->id, ['controller' => 'Categories', 'action' => 'view', $answer->category->id]) : '' ?></td>
                <td><?= $answer->has('question') ? $this->Html->link($answer->question->id, ['controller' => 'Questions', 'action' => 'view', $answer->question->id]) : '' ?></td>
                <td><?= $answer->has('survey') ? $this->Html->link($answer->survey->name, ['controller' => 'Surveys', 'action' => 'view', $answer->survey->id]) : '' ?></td>
                <td><?= $answer->has('option') ? $this->Html->link($answer->option->id, ['controller' => 'Options', 'action' => 'view', $answer->option->id]) : '' ?></td>
                <td><?= $answer->has('user') ? $this->Html->link($answer->user->name, ['controller' => 'Users', 'action' => 'view', $answer->user->id]) : '' ?></td>
                <td><?= h($answer->answer) ?></td>
                <td><?= h($answer->remark) ?></td>
                <td><?= $this->Number->format($answer->rating) ?></td>
                <td><?= h($answer->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $answer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $answer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $answer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answer->id)]) ?>
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
