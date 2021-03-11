<?php

/**
 * @var \App\View\AppView $this
 */
?>
<!-- <?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $user->user_id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]
        )
        ?> -->

<style>
    label {
        color: black;
    }

    .btnPos {
        margin-top: 5px;
        margin-left: 45%;
        margin-right: 45%;
    }
</style>

<div style="margin-top: 5px;">
    <a class="waves-effect waves-light btn indigo right" href="/PRS/users/index">User List</a>
    <?= $this->Form->create($user, [
        'class' => 'was-validated', 'enctype' => 'multipart/form-data'
    ]) ?>
    <div>
        <fieldset>
            <legend>
                <h4>User Update Form</h4>
            </legend>
            <?php


            echo "<table style='width:80%'><tr><th>";
            echo $this->Form->control('profile_img', ['type' => 'file', 'label' => '']);
            echo $this->Form->control('img_name', ['type' => 'hidden', 'default' => $user->profile_img]);
            echo "</th><th>";
            if (!empty($user->profile_img)) {
                echo $this->Html->image('profile_img/' . $user->profile_img, array('width' => '150px', 'height' => '150px', 'alt' => $user->profile_img));
            } else {
                echo $this->Html->image('profile_img/default.png', array('width' => '150px', 'height' => '150px', 'alt' => $user->profile_img));
            }
            echo "</th></tr><tr ><th >User Name</th><th class='input-field '>";
            echo $this->Form->control('name', array('label' => '', 'class' => 'validate'));
            echo "</th></tr><tr ><th>User Email</th><th class='input-field'>";
            echo $this->Form->control('email', array('label' => '', 'class' => 'validate'));
            echo "</th></tr><tr ><th >User Password</th><th class='input-field '>";
            echo $this->Form->control('password', ['label' => '', 'maxlength' => '20', 'class' => 'validate']);
            echo "</th></tr><tr><th>Gender</th><th class='input-field '>";
            // echo $this->Form->radio('gender', $options, array('label' => '', 'class' => 'with-gap'));
            echo "
            <p>
            <label>
              <input class='with-gap' name='gender' type='radio' value='male' ";
            if ($user->gender == 'male') {
                echo "checked";
            }
            echo "/>
              <span>Male</span>
            </label>
            &emsp;
            <label>
            <input class='with-gap' name='gender' type='radio' value='female'";
            if ($user->gender == 'female') {
                echo "checked";
            }
            echo "/>
            <span>Female</span>
            </label>
        </p>
            ";
            echo "</th></tr><tr ><th >Phone Number</th><th class='input-field '>";
            echo $this->Form->control('phone', array('label' => '', 'class' => 'validate', 'type' => 'number'));
            echo "</th></tr><tr><th>Date Of Birth</th><th style='width:100%;'>";
            echo $this->Form->control(
                'birthdate',
                [
                    'label' => '',
                    'class' => 'txt',
                    'type' => 'text',
                    'id' => 'datetimepicker',
                    'value' => $user->birthdate->i18nFormat('YYY-MM-dd')
                ]
            );

            echo "</th></tr><table>";

            ?>
        </fieldset>

        <div class="btnPos">
            <?= $this->Form->button(__('Update'), ['class' => 'indigo waves-effect waves-light btn']) ?>
        </div>
        <?= $this->Form->end() ?>
        <script>
            $('#datetimepicker').datetimepicker({
                format: date('YYY-MM-dd'),
                lang: 'eng'
            });
        </script>
    </div>
</div>
