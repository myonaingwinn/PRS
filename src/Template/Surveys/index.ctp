<div class="surveys index large-9 medium-8 columns content">
    <div class="col s8">
        <h3><?= __('Surveys') ?></h3>
    </div>
    <!-- Old search box -->
    <!-- <div class="input-field col s4">
            <i class="material-icons prefix">search</i>
            <input id="search" name="search" type="text" class="validate" placeholder="Search...">
        </div> -->
    <div class="row my-row">
        <div class="col s4 Flatsearch">
            <?= $this->Form->text('search', ['id' => 'search', 'size' => '100', 'maxlength' => '100', 'placeholder' => 'Search...']) ?>
            <?= $this->Form->button('<i class="small material-icons prefix">search</i>', ['type' => 'button', 'id' => 'button']); ?>
        </div>
        <div class="col s5"></div>
        <div class="col s3">
            <a id="btnAddSurvey" href="/add_survey" class="btn indigo right">New Survey</a>
        </div>
    </div>
    <div class="table-content">
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" width="20%"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col" width="35%"><?= $this->Paginator->sort('description') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                    <!-- <th scope="col"><?= $this->Paginator->sort('del_flg') ?></th> -->
                    <th scope="col"><?= $this->Paginator->sort('admin_id') ?></th>
                    <th scope="col" width="11%"><?= $this->Paginator->sort('created') ?></th>
                    <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                    <th scope="col" class="actions" width="10%"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $page = $this->Paginator->counter(['format' => __('{{page}}')]);
                $no = 1;
                if ($page > 2)
                    $no = $page * 20 - 19;
                else if ($page == 2)
                    $no = $page * 10 + 1; ?>
                <?php foreach ($surveys as $survey) : ?>
                    <tr>
                        <!-- <td><?= $this->Number->format($survey->id) ?></td> -->
                        <td><?= $no++ ?></td>
                        <td><?= h($survey->name) ?></td>
                        <td><?= h($survey->description) ?></td>
                        <td><?= $survey->has('product') ? h($survey->product->name) : '' ?></td>
                        <td><?= $survey->has('category') ? h($survey->category->name) : '' ?></td>
                        <!-- <td><?= h($survey->del_flg) ?></td> -->
                        <td><?= $survey->has('admin') ? h($survey->admin->email) : '' ?></td>
                        <td><?= h($survey->created->i18nFormat('yyyy-MM-dd')) ?></td>
                        <!-- <td><?= h($survey->modified) ?></td> -->
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $survey->id]) ?>
                            <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $survey->id]) ?> -->
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $survey->id], ['confirm' => __('Are you sure you want to delete "{0}"?', $survey->name)]) ?>
                            <?= ($survey->public == 'N') ? $this->Html->link(__('Publish'), ['action' => 'publish', $survey->id]) : '<i>Published</i>' ?>
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

    .my-row {
        margin-bottom: .5rem;
        margin-top: -.5rem;
    }

    #btnAddSurvey {
        margin-top: .6rem;
    }
</style>

<script>
    $('document').ready(function() {
        $('#search').keyup(function() {
            if (!$(this).val() || $(this).val().trim() == '') {
                location.reload();
            } else {
                var searchkey = $(this).val();
                searchSurveys(searchkey);
            }
        });

        function searchSurveys(keyword) {
            var data = keyword;
            $.ajax({
                method: 'get',
                url: "<?php echo $this->Url->build(['controller' => 'Surveys', 'action' => 'Search']); ?>",
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