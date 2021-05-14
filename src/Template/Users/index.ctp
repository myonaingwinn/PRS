<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<style>
    i.small.material-icons.prefix {
        margin-left: -2rem;
        color: gray;

    }

    #search {
        padding-right: 1.8rem;
    }

    #button {
        margin-right: 2rem;
    }

    .capitalize {
        text-transform: capitalize;
    }

    .Flatsearch {
        align-items: center;
        border-radius: 5px;
        border: 0px solid #ccc;
        display: flex;
        justify-content: space-between;
        width: 300px;
        margin: 1px 0;
        padding: 0px;
        color: #000;
        transition: all 0.5s ease 0s;
    }

    .Flatsearch button,
    .Flatsearch input {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: transparent;
        border: 0;
        color: inherit;
        font: inherit;
        outline: 0;
    }
</style>

<!-- <a class="waves-effect waves-light btn indigo right" href="/users/add" style="margin-top: 5px;">New User</a> -->

<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>

    <!-- <?= $this->Form->control('search'); ?> -->
    <div class="col s4 Flatsearch">
        <?= $this->Form->text('search', ['id' => 'search', 'size' => '100', 'maxlength' => '100', 'placeholder' => 'Search...']) ?>
        <?= $this->Form->button('<i class="small material-icons prefix">search</i>', ['type' => 'button', 'id' => 'button']); ?>
    </div>

    <div class="table-content">

        <table>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Date of Birth') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Create Date') ?></th>
                    <!-- <th scope="col"><?= $this->Paginator->sort('reward') ?></th> -->
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
                        <td class="capitalize"> <?= h($user->gender) ?></td>
                        <td><?= h($user->phone) ?></td>
                        <td><?= h($user->birthdate->i18nFormat('YYY-MM-dd')) ?></td>
                        <td class="capitalize"><?= h($user->premium_flg) ?></td>
                        <td><?= h($user->created->i18nFormat('YYY-MM-dd')) ?></td>
                        <!-- <td class="capitalize"><?= h($user->scores ? $user->scores[0]->score : 'Empty') ?></td> -->

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
</div>


<script>
    $('document').ready(function() {
        $('#search').keyup(function() {
            if (!$(this).val() || $(this).val().trim() == '') {
                location.reload();
            } else {
                var searchkey = $(this).val();
                searchUsers(searchkey);
            }
        });

        function searchUsers(keyword) {
            var data = keyword;
            $.ajax({
                method: 'get',
                url: "<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'Search']); ?>",
                data: {
                    keyword: data
                },

                success: function(response) {
                    $('.table-content').html(response);
                }
            });
        };
    });
</script>
