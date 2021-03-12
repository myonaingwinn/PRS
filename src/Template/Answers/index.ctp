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
            <?php foreach ($answers as $answer) : ?>
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