<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Luckydraw[]|\Cake\Collection\CollectionInterface $luckydraw
  */

 //Cutom CSS and JS Files
echo $this->Html->css('materialize');
echo $this->Html->css('materialize.min');
echo $this->Html->css('luckydraw_index');

echo $this->Html->script('jquery-3.5.1');
echo $this->Html->script('jquery-3.5.1.min');
echo $this->Html->script('materialize');
echo $this->Html->script('materialize.min');
?>

<center>
    <h3><?= __('Score List For Luckydraw') ?></h3>
    <?= $this->Html->link("New", array('controller' => 'Luckydraw','action'=> 'add'), array( 'class' => 'button','id'=>'btnNew')) ?>
     <div id="luckydraw-border">
        <div class="row" id="luckydraw-title">
            <div class="col s2"><?= $this->Paginator->sort('id') ?></div>
            <div class="col s2"><?= $this->Paginator->sort('scores') ?></div>
            <div class="col s2"><?= $this->Paginator->sort('color') ?></div>
            <div class="col s2"><?= $this->Paginator->sort('created') ?></div>
            <div class="col s2"><?= $this->Paginator->sort('modified') ?></div>
            <div class="col s2"><?= __('Actions') ?></div>
            </div>
            <hr>
            <?php foreach ($luckydraw as $luckydraw): ?>
            <div class="row" id="luckydraw-body">
            <div class="col s2"><?= $this->Number->format($luckydraw->id) ?></div>
            <div class="col s2"><?= h($luckydraw->scores) ?></div>
            <div class="col s2"><p id="color" style="background-color:<?= h($luckydraw->color) ?> ;"><?= h($luckydraw->color) ?></p></div>
            <div class="col s2"><?= h($luckydraw->created) ?></div>
            <div class="col s2"><?= h($luckydraw->modified) ?></div>
            <div class="col s2">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $luckydraw->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $luckydraw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $luckydraw->id)]) ?>
                    </div>
                    </div>
            <?php endforeach; ?>
    <div>
</center>
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

