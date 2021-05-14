<!-- Admin and User Back Button -->
<?php
if ($purl === '1') : ?>
    <?= $this->Html->link(__('Back'), ['action' => 'index', 1], ['class' => 'waves-effect waves-light btn indigo right']) ?>
<?php else : ?>
    <?= $this->Html->link(__('Back'), ['action' => 'index', 0], ['class' => 'waves-effect waves-light btn indigo right']) ?>
<?php endif; ?>

<!-- Header name as product name -->
<h4><?= __($product['name']) ?></h4>
<hr>
<br>

<!-- Body Section -->
<div class="row">
    <!-- Body Upper Left -->
    <div class="col s6 ">
        <!-- Image -->
        <?php if ($product['image'] === '' || $product['image'] === NULL) : ?>
            <?= __('There is no image for this product.') ?>
        <?php else : ?>
            <?= $this->HTML->image($product['image'], ['pathPrefix' => 'upload/images/', 'alt' => $product['name'], 'width' => '100%', 'height' => '380']) ?>
        <?php endif; ?>
    </div>
    <div class="col s1"></div>
    <!-- Body Upper Right -->
    <div class="col s5">
        <!-- Name -->
        <div class="row">
            <div class="col s4 bold">Product Name</div>
            <div class="col s1"> - </div>
            <div class="col s7"><?= __($product['name']) ?></div>
        </div>

        <!-- Model -->
        <div class="row">
            <div class="col s4 bold">Model</div>
            <div class="col s1"> - </div>
            <div class="col s7">
                <?php if ($product['model_no'] === NULL || $product['model_no'] === '') : ?>
                    <?= __('empty') ?>
                <?php else : ?>
                    <?= __($product['model_no']) ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Price -->
        <div class="row">
            <div class="col s4 bold">Price</div>
            <div class="col s1"> - </div>
            <div class="col s7"><?= $this->Number->format($product['price']) ?> MMK</div>
        </div>

        <!-- Company -->
        <div class="row">
            <div class="col s4 bold">Company</div>
            <div class="col s1"> - </div>
            <div class="col s7"><?= __($product['company']['name']) ?></div>
        </div>

        <!-- Categories -->
        <div class="row">
            <div class="col s4 bold">Categories</div>
            <div class="col s1"> - </div>
            <div class="col s7"><?= __($product['category']['name']) ?></div>
        </div>

        <!-- Created Date -->
        <div class="row">
            <div class="col s4 bold">Created Date</div>
            <div class="col s1"> - </div>
            <div class="col s7"><?= h($product->created->i18nFormat('yyyy-MM-dd')) ?></div>
        </div>

        <!-- Modified Date -->
        <div class="row">
            <div class="col s4 bold">Modified Date</div>
            <div class="col s1"> - </div>
            <div class="col s7"><?= h($product->modified->i18nFormat('yyyy-MM-dd')) ?></div>
        </div>

        <!-- Description -->
        <div class="row">
            <div class="col s4 bold">Description</div>
            <div class="col s1"> - </div>
            <div class="col s7">
                <?php if ($product['description'] === NULL || $product['description'] === '') : ?>
                    <?= __('empty') ?>
                <?php else : ?>
                    <?= __($product['description']) ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
    <!-- Body Upper End -->

</div>
<!-- Body Lower -->
<div class="row">
    <!-- Divide Center -->
    <div class="col s12">
        <!-- Video -->
        <?php if ($product['video'] === NULL || $product['video'] === '') : ?>
            <?= __('There is no video for this product.') ?>
        <?php else : ?>
            <div class="row"></div>
            <div class="row"></div>
            <h5><?= __('Content Video of ' . $product['name']) ?></h5>
            <hr>
            <br>
            <?= $this->HTML->media([$product['video'], ['src' => $product['video'], 'type' => "video/ogg'"]], ['controls', 'pathPrefix' => 'upload/videos/', 'alt' => $product['name'], 'width' => '100%']) ?>
        <?php endif; ?>
    </div>

</div>
<!-- Body Lower End -->
<!-- Body Section End -->

<!-- font bold, body upper right -->
<style>
    .bold {
        font-weight: bold;
    }

    h5 {}
</style>