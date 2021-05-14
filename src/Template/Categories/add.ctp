<?php

/**
 * @var \App\View\AppView $this
 */
?>
<style>
    .card {
        margin-top: 5rem;
        width: 400px;
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

    #txtCatName{
        padding-top: 1rem;
        margin-bottom: -1rem;
    }
</style>

<div class="container">
    <center>
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <form action="add" method="post">
                        <span class="card-title">Add Category</span>
                        <div class="input-field col s12 my-input">
                            <input id="txtCatName" placeholder="Enter Category Name" name="name" type="text" class="validate" required>
                        </div>
                </div>
            </div>
            <div class="card-action">
                <div class="row">
                    <button type="submit" class="waves-effect waves-light btn indigo center">Save</button>&emsp;
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'waves-effect waves-light btn center indigo']) ?>
                </div>
                </form>
            </div>
        </div>
    </center>
</div>