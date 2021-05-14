<style>
    .card {
        margin-top: 5rem;
    }

    center {
        padding-top: 1rem;
        margin-bottom: -1.5rem;
    }

    .input {
        margin: 1rem;
    }

    .row {
        margin-bottom: -.1rem;
    }

    .card-action{
        margin-top: -1.8rem;
    }

    th{
        text-align: center;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col s1"></div>
        <div class="col s10">
            <div class="card">
                <center>
                    <span class="card-title">Update Category</span>
                </center>
                <div class="card-content">
                    <?= $this->Form->create($category) ?>
                    <table>
                        <tr>
                            <th>Category Name</th>
                            <td>
                                <?= $this->Form->control('name', array('label' => '', 'class' => 'input-field validate')); ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-action center">
                    <button type="submit" class="waves-effect waves-light btn indigo center">Update</button>&emsp;
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'waves-effect waves-light btn center indigo']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <div class="col s1"></div>
</div>
</div>