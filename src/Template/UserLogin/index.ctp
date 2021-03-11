<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>

    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    Forget Password?<?= $this->Html->link("Sign up", ['action' => 'register']); ?>
    <br>
    Don't have an account?<?= $this->Html->link("Sign up", ['action' => 'register']); ?>
    Forget Password?<?= $this->Html->link("Forgot Password", ['action' => 'forgetPassword']); ?>

    <?= $this->Form->end() ?>


</div>