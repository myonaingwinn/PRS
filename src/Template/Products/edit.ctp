<?php

use Cake\Log\Log;
?>
<style>
    .select {
        background-color: #3f51b5 !important;
    }
</style>
<?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'waves-effect waves-light btn indigo right']) ?>
<h4><?= __('Product Modification') ?></h4>
<hr>
<div class="row">
    <div class="col s1"></div>
    <div class="col s10">
        <?= $this->Form->create($product, ['class' => 'was-validated', 'enctype' => 'multipart/form-data']) ?>
        <?= $this->Form->hidden('id', ['id' => 'id']) ?>
        <h5><?= __('Product Infomation') ?></h5>
        <hr>
        <div class="row">
            <div class="input-field col s11">
                <i class="material-icons prefix">badge</i>
                <?= $this->Form->text('name', ['id' => 'name', 'autofocus', 'size' => '100', 'maxlength' => '100']) ?>
                <?= $this->Form->label('name') ?>
            </div>
            <div class="input-field col s11">
                <i class="material-icons prefix">tag</i>
                <?= $this->Form->text('model_no', ['id' => 'model_no', 'size' => '100', 'maxlength' => '100']) ?>
                <?= $this->Form->label('model_no') ?>
            </div>
            <div class="input-field col s11">
                <i class="material-icons prefix">attach_money</i>
                <?= $this->Form->number('price', ['id' => 'price', 'min' => '0', 'max' => '999999999999999', 'title' => 'Please insert MMK currency']) ?>
                <?= $this->Form->label('price') ?>
            </div>
            <div class="row">
                <div class="file-field input-field col s6">
                    <div class="btn indigo">
                        <span class="material-icons">wallpaper</span>
                        <?= $this->Form->file('image', ['accept' => 'image/jpeg', 'id' => 'image']) ?>
                    </div>
                    <div class="file-path-wrapper">
                        <?= $this->Form->text('image', ['class' => 'file-path validate', 'placeholder' => 'Please choose single image file', 'id' => 'image']) ?>
                    </div>
                </div>
                <div class="file-field input-field col s6">
                    <div class="btn indigo">
                        <span class="material-icons">movie</span>
                        <?= $this->Form->file('video', ['accept' => 'video/mp4']) ?>
                    </div>
                    <div class="file-path-wrapper">
                        <?= $this->Form->text('video', ['class' => 'file-path validate', 'placeholder' => 'Please choose single video file']) ?>
                    </div>
                </div>
            </div>
        </div>
        <h5><?= __('Category Infomation') ?></h5>
        <hr>
        <div class="row">
            <div class="col s3">
                <?= __('Product Category') ?>
            </div>
            <div class="col s8">
                <select id="typeCat" name="category_id">
                    <option value="">Select Category</option>
                    <?php foreach ($categories_list as $c) : $selected = "";

                        //$this->log("Something work for categoryID " . $product->category_id, 'debug');

                        if ($c->id == $product->category_id)
                            $selected = "selected"; ?>
                        <option value="<?= h($c->id) ?>" <?php echo $selected ?>><?= h($c->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <h5><?= __('Company Information') ?></h5>
        <hr>
        <div class="row">
            <div class="col s3">
                <?= __('Product Company') ?>
            </div>
            <div class="col s8">
                <select id="typeCom" name="company_id">
                    <option value="">Select Company</option>
                    <?php foreach ($companies_list as $c) :
                    ?>
                        <option value="<?= h($c->id) ?>"><?= h($c->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div align="center">
            <?= $this->Form->button(__('Register'), ['class' => 'btn-large waves-effect waves-light indigo center']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="col s1"></div>
</div>
<script>
    $(document).ready(function() {
        $('select').formSelect();

    });

    $("#typeCat").on('change', function() {
        var categories = <?php echo json_encode($categories_list); ?>;
        var companies = <?php echo json_encode($companies_list); ?>;
        var categoryID = $(this).val();

        $('#typeCom option').remove();
        $('#typeCom').append('<option value="" disabled >Select company</option>');

        $.each(companies, function() {
            var str = $(this)[0].category_type;

            if (str != undefined) {
                if (str.includes(categoryID)) {
                    $('#typeCom').append('<option value="' + $(this)[0].id + '">' + $(this)[0].name + '</option>');
                }
            }
        });
        $('select').formSelect();
    }).change();
</script>