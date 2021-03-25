<?php
// echo $this->Html->css('jquery.datetimepicker');
// echo $this->Html->script('jquery.datetimepicker.full.js');

/**
 * @var \App\View\AppView $this
 */

?>
<style>
    label {
        color: black;
    }

    .btnPos {
        margin-top: 1rem;
        margin-left: 45%;
        margin-right: 45%;
    }

    h5 {
        padding-top: 1.5rem;
    }

    .col.s12 {
        margin-bottom: -2rem;
    }

    td,
    th {
        padding: 10px 5px;
        display: table-cell;
        text-align: left;
        vertical-align: middle;
        border-radius: 2px;
    }
</style>

<div class="container" style="margin-top: 5px;">

    <?= $this->Form->create($newUser, [
        'class' => 'was-validated', 'enctype' => 'multipart/form-data'
    ]) ?>
    <div class="card">
        <h5 class="center">Register</h5>
        <?php
        echo "<div class='card-content'><div class='row'><div class='col s12'><table><tr><th>";
        echo $this->Form->control('profile_img', ['type' => 'file', 'label' => '']);
        echo "</th><th></th></tr><tr ><th>User Name</th><th class='input-field '>";
        echo $this->Form->control('name', array('label' => '', 'class' => 'validate'));
        echo "</th></tr><tr><th >User Email</th><th class='input-field '>";
        echo $this->Form->control('email', array('label' => '', 'class' => 'validate'));
        echo "</th></tr><tr ><th>User Password</th><th class='input-field '>";
        echo $this->Form->control('password', ['label' => '', 'maxlength' => '20', 'class' => 'validate']);
        echo "</th></tr><tr ><th >Gender</th><th class='input-field '>";
        echo "
            <p>
            <label>
              <input class='with-gap' name='gender' type='radio' value='male'/>
              <span>Male</span>
            </label>
            &emsp;
            <label>
            <input class='with-gap' name='gender' type='radio' value='female' />
            <span>Female</span>
          </label>
        </p>
            ";
        echo "</th></tr><tr ><th >Phone Number</th><th class='input-field '>";
        echo $this->Form->control('phone', array('label' => '', 'class' => 'validate', 'type' => 'number'));
        echo "</th></tr><tr><th>Date of Birth</th><th class='input-field'>";
        echo $this->Form->control(
            'birthdate',
            [
                'label' => '',
                'class' => 'txt',
                'type' => 'text',
                'id' => 'datetimepicker',
                'default' => date('Y-m-d') #Set time for today
            ]
        );
        echo "</th></tr><table></div></div></div>";

        ?>
        <div class="btnPos">
            <?= $this->Form->button(__(' Register '), ['class' => 'indigo waves-effect waves-light btn']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>