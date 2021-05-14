<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= __('No') ?></th>
            <th scope="col" width="25%"><?= __('Name') ?></th>
            <th scope="col"><?= __('Description') ?></th>
            <!-- <th scope="col"><?= __('product_id') ?></th>
                <th scope="col"><?= __('category_id') ?></th> -->
            <th scope="col" width="15%"><?= __('Answered Date') ?></th>
            <!-- <th scope="col"><?= __('modified') ?></th> -->
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
        <?php foreach ($answers as $answer) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= h($answer->survey->name) ?></td>
                <td><?= h($answer->survey->description) ?></td>
                <td><?= h($answer->created->i18nFormat('yyyy-MM-dd')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $answer->survey->id]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>