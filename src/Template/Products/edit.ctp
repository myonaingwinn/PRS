<!-- Back Button -->
<?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'waves-effect waves-light btn indigo right']) ?>

<!-- Header -->
<h4><?= __('Product Modification') ?></h4>
<hr>

<!-- Body Section -->
<div class="row">

    <div class="col s1"></div>
    <!-- Main Body -->
    <div class="col s10">
        
        <!-- Form Create -->
        <?= $this->Form->create($product, ['class' => 'was-validated', 'enctype' => 'multipart/form-data']) ?>
        
        <!-- Product Sub Header -->
        <h5><?= __('Product Infomation') ?></h5>
        <hr>
        
        <!-- Product Information -->
        <div class="row">

            <!-- Name -->
            <div class="input-field col s11">
                <i class="material-icons prefix">badge</i>
                <?= $this->Form->text('name', ['id' => 'name', 'autofocus', 'size' => '100', 'maxlength' => '100']) ?>
                <?= $this->Form->label('name') ?>
            </div>

            <!-- Model No -->
            <div class="input-field col s11">
                <i class="material-icons prefix">tag</i>
                <?= $this->Form->text('model_no', ['id' => 'model_no', 'size' => '100', 'maxlength' => '100']) ?>
                <?= $this->Form->label('model_no') ?>
            </div>

            <!-- Price -->
            <div class="input-field col s11">
                <i class="material-icons prefix">attach_money</i>
                <?= $this->Form->number('price', ['id' => 'price', 'min' => '0', 'max' => '999999999999999', 'title' => 'Please insert MMK currency']) ?>
                <?= $this->Form->label('price') ?>
            </div>

            <!-- Description -->
            <div class="input-field col s11">
                <i class="material-icons prefix">description</i>
                <?= $this->Form->text('description', ['id' => 'description', 'size' => '500', 'maxlength' => '500']) ?>
                <?= $this->Form->label('description') ?>
            </div>

            <!-- Image and Video -->
            <div class="row">
                <!-- File Image Section -->
                <div class="file-field input-field col s6">
                    <div class="btn indigo">
                        <span class="material-icons">wallpaper</span>
                        <?= $this->Form->file('image', ['accept' => 'image/jpeg', 'id' => 'image']) ?>
                    </div>
                    <div class="file-path-wrapper">
                        <?= $this->Form->text('image', ['class' => 'file-path validate', 'placeholder' => 'Please choose single image file', 'id' => 'image']) ?>
                    </div>
                </div>
                <!-- File Video Section -->
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
            <!-- End Image and Video -->

        </div>
        <!-- End Product Information -->

        <!-- Category Information -->
        <h5><?= __('Category Infomation') ?></h5>
        <hr>
        <div class="row">
            <div class="col s3">
                <?= __('Product Category') ?>
            </div>
            <!-- Drop Down List -->
            <div class="col s8">
                <?= $this->Form->select('category_id', $options_cat, ['class' => 'btn indigo']) ?>
            </div>
        </div>
        <!-- End Categroy Information -->

        <!-- Company Information -->
        <h5><?= __('Company Infomation') ?></h5>
        <hr>
        <div class="row">
            <div class="col s3">
                <?= __('Product Company') ?>
            </div>
            <!-- Drop Down List -->
            <div class="col s8">
                <?= $this->Form->select('company_id', $options_com, ['class' => 'btn indigo']) ?>
            </div>
        </div>
        <!-- End Company Information -->
        
        <!-- Main Update Button -->
        <div align="center">
            <?= $this->Form->button(__('Update'), ['class' => 'btn-large waves-effect waves-light indigo']) ?>
        </div>
        <?= $this->Form->end() ?>
        <!-- End Form -->
    </div>
    <!-- End Main Body -->

    <div class="col s1"></div>
    
</div>
<!-- End Body Section -->