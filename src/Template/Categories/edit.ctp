<style>
    .card {
        margin-top: 5rem;
        width: 500px;
    }

    .input {
        margin: 1rem;
    }

    .row {
        margin-bottom: -.1rem;
    }

    .my-input {
        margin-top: 0rem;
    }

    .my-row1 {
        margin-top: -.2rem;
    }

    .my-row2 {
        margin-top: .1rem;
    }
</style>
<div class="container">
    <center>
        <div class="card">
            <div class="card-content">
                <?= $this->Form->create($category) ?>
                <fieldset>
                    <legend><?= __('Edit Category') ?></legend>
                    <table class="vertical-table">
                        <tr>
                            <th scope="row"><?= __('Category Name') ?></th>
                            <td><?= $this->Form->control('name', array('label' => '', 'class' => 'validate')); ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Del_Flg Status') ?></th>
                            <td><?= $this->Form->control('del_flg', array('label' => '', 'class' => 'validate')); ?></td>
                        </tr>

                    </table>
                </fieldset>
                <div class="row">
                    <button type="submit" class="waves-effect waves-light btn indigo center">Update</button>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'waves-effect waves-light btn center indigo']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
</div>