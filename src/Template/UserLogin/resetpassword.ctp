<?php echo $this->Flash->render() ?>
<?= $this->Form->create() ?>
<?= $this->Form->control('password', ['required' => true]); ?>
<?= $this->Form->submit() ?>
<?= $this->Form->end() ?>
