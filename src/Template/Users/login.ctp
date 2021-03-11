<div class="row">
    <?php
    echo $this->Form->create();
    echo $this->Form->controls(
        [
            'email' => ['required' => true, 'placeholder' => 'Enter your Email', 'type' => 'email'],
            'password' => ['required' => true, 'placeholder' => 'Enter your password'],
        ],
        ['legend' => 'Login Here']
    );
    echo $this->Form->submit(__('Login'));
    echo "Don't have an account?";
    echo $this->Html->link("Sign up", ['action' => 'register']);
    echo $this->Form->end();
    ?>
</div>
<?php
