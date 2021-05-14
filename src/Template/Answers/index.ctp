<style>
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

    .table-content {
        margin-top: -1.2rem;
    }

    .my-row {
        margin-bottom: .5rem;
        margin-top: -.5rem;
    }
</style>
<div class="surveys index large-9 medium-8 columns content">
    <h3><?= __('Surveys History') ?></h3>
    <div class="row my-row">
        <div class="col s4 Flatsearch">
            <?= $this->Form->text('search', ['id' => 'search', 'size' => '100', 'maxlength' => '100', 'placeholder' => 'Search for name...']) ?>
            <?= $this->Form->button('<i class="small material-icons prefix">search</i>', ['type' => 'button', 'id' => 'button']); ?>
        </div>
    </div>
    <div class="table-content">
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= ('No') ?></th>
                    <th scope="col" width="25%"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                    <!-- <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('category_id') ?></th> -->
                    <th scope="col" width="15%"><?= $this->Paginator->sort('answered date') ?></th>
                    <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
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
    </div>
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

<script>
    $('document').ready(function() {
        $('#search').keyup(function() {
            if (!$(this).val() || $(this).val().trim() == '') {
                location.reload();
            } else {
                var searchkey = $(this).val();
                searchAnswers(searchkey);
            }
        });

        function searchAnswers(keyword) {
            var data = keyword;
            $.ajax({
                method: 'get',
                url: "<?php echo $this->Url->build(['controller' => 'Answers', 'action' => 'Search']); ?>",
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