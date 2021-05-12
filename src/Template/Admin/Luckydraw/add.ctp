<?php

/**
 * @var \App\View\AppView $this
 */

?>
<!-- Grid column -->
<div class="container">

  <!--Form without header-->
  <div class="card">

    <div class="card-content">
      <?= $this->Form->create($luckydraw) ?>

      <!--Header-->
      <span class="card-title">Add Score</span>
      <div class="input-field col s6">
        <?php echo $this->Form->control('scores', array('label' => false, 'placeholder' => 'Score')); ?>
      </div>
      <div class="input-field col s6">
        <?php echo $this->Form->control('color', array('label' => false, 'type' => 'color', 'id' => 'color', 'placeholder' => 'Choose')); ?>
      </div>
    </div>
    <div class="card-action">
      <div class="row my-row">
        <div class="col s3"></div>
        <div class="col s3">
          <?= $this->Form->button(__('Save'), ['action' => 'add', 'id' => 'btnSave', 'class' => 'waves-effect waves-light btn right indigo']) ?>
        </div>
        <div class="col s3">
          <?= $this->Html->link("Cancel", array('controller' => 'Luckydraw', 'action' => 'index'), array('class' => 'waves-effect waves-light btn right indigo', 'id' => 'btnCancel')) ?>
        </div>
        <div class="col s3"></div>
      </div>
    </div>
    <?= $this->Form->end() ?>
  </div>
</div>

<style>
  .container {
    margin-top: 5rem;
    width: 60%;
  }

  #btnSave {
    margin-right: 40px;
    margin-bottom: -1rem;
  }

  #btnCancel {
    margin-right: -40px;
    margin-bottom: -1rem;
  }

  #color {
    width: 150px;
    height: 30px;
  }
</style>