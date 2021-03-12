<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!-- <a class="waves-effect waves-light btn indigo right" href="/users/add" style="margin-top: 5px;">New User</a> -->
<div class="users index large-9 medium-8 columns content">

    <table>
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('No') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date of Birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('premium_flg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reward') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $page = $this->Paginator->counter(['format' => __('{{page}}')]);
            $no = 1;
            if ($page > 2)
                $no = $page * 20 - 19;
            else if ($page == 2)
                $no = $page * 10 + 1; ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->gender) ?></td>
                    <td><?= h($user->phone) ?></td>
                    <td><?= h($user->birthdate->i18nFormat('YYY-MM-dd')) ?></td>
                    <td><?= h($user->premium_flg) ?></td>
                    <td><?= h($user->reward) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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