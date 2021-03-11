<?php echo $this->Flash->render() ?>
<?= $this->Form->create() ?>
<?= $this->Form->control('email', ['required' => true]); ?>
<?= $this->Form->submit() ?>
<?= $this->Form->end() ?>