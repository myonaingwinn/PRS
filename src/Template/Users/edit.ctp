<div class="container">
    <div class="card">
        <div class="card-content">
            <header>
            </header>
            <!-- <form method="POST"> -->
            <?= $this->Form->create($user, [
                'class' => 'was-validated', 'enctype' => 'multipart/form-data'
            ]) ?>
            <input type="hidden" name="admin_id" value="<?= $admin['id'] ?>" />
            <main>
                <div class="row">
                    <div class="left col s12">
                        <div class="photo-left">
                            <img class="photo" src="/img/profile_img/<?= $user['profile_img'] ? $user['profile_img'] : 'default.png' ?>" />
                        </div>
                        <?php
                        echo $this->Form->control('userType', ['type' => 'hidden', 'id' => 'usertype', 'value' => '']);
                        echo "<table>";
                        if (!$admin['id']) {
                            echo "<tr><th>Choose profile</th><th class='input-field'>";
                            echo $this->Form->control('profile_img', ['type' => 'file', 'label' => '']);
                        }
                        echo $this->Form->control('img_name', ['type' => 'hidden', 'default' => $user->profile_img]);
                        echo "</th></tr><tr><th>Name</th><th class='input-field '>";
                        if ($admin['id'])
                            echo $this->Form->control('name', array('label' => '', 'class' => 'validate', 'disabled' => true, 'value' => $user->name));
                        else
                            echo $this->Form->control('name', array('label' => '', 'class' => 'validate', 'value' => $user->name));

                        echo "</th></tr><tr ><th>Email</th><th class='input-field'>";
                        if ($admin['id'])
                            echo $this->Form->control('email', array('label' => '', 'class' => 'validate', 'disabled' => true, 'value' => $user->email));
                        else echo $this->Form->control('email', array('label' => '', 'class' => 'validate', 'value' => $user->email));
                        if (empty($admin['id'])) {
                            echo "</th></tr><tr ><th >Password</th><th class='input-field '>";
                            echo $this->Form->control('password', ['label' => '', 'maxlength' => '20', 'class' => 'validate', 'value' => $user->password]);
                        } else {
                            echo $this->Form->control('password', ['type' => 'hidden', 'default' => $user->password]);
                        }
                        echo "</th></tr><tr><th>Gender</th><th class='input-field '>";
                        echo "<p><label><input class='with-gap' name='gender' type='radio' value='male' ";
                        if ($user->gender == 'male') {
                            echo "checked";
                        }
                        if ($admin['id']) echo " disabled";
                        echo "/><span>Male</span></label>&emsp;<label><input class='with-gap' name='gender' type='radio' value='female'";
                        if ($user->gender == 'female') {
                            echo "checked";
                        }
                        if ($admin['id']) echo " disabled";
                        echo "/><span>Female</span></label></p>";
                        echo "</th></tr>";
                        if ($admin['id']) {
                            echo "</th></tr><tr><th>User Type</th><th class='input-field '>";
                            echo "<p><label><input class='with-gap' name='type' type='radio' value='normal' ";
                            if ($user->premium_flg == 'normal') {
                                echo "checked";
                            }
                            echo "/><span>Normal</span></label>&emsp;<label><input class='with-gap' name='type' type='radio' value='premium'";
                            if ($user->premium_flg == 'premium') {
                                echo "checked";
                            }
                            echo "/><span>Premium</span></label></p>";
                        }
                        echo "<tr><th>Phone Number</th><th class='input-field '>";
                        if ($admin['id'])
                            echo $this->Form->control('phone', array('label' => '', 'class' => 'validate', 'disabled' => true, 'type' => 'number', 'value' => $user->phone));
                        else echo $this->Form->control('phone', array('label' => '', 'class' => 'validate', 'type' => 'number', 'value' => $user->phone));
                        echo "</th></tr><tr><th>Date Of Birth</th><th style='width:100%;'>";
                        if ($admin['id'])
                            echo $this->Form->control(
                                'birthdate',
                                [
                                    'label' => '',
                                    'class' => 'txt',
                                    'type' => 'text',
                                    'id' => 'datetimepicker',
                                    'value' => $user->birthdate->i18nFormat('YYY-MM-dd'),
                                    'disabled' => true,
                                ]
                            );
                        else echo $this->Form->control(
                            'birthdate',
                            [
                                'label' => '',
                                'class' => 'txt',
                                'type' => 'text',
                                'id' => 'datetimepicker',
                                'value' => $user->birthdate->i18nFormat('YYY-MM-dd')
                            ]
                        );
                        echo "</th></tr><table>"; ?>
                    </div>
                </div>
            </main>
            <!-- </form> -->
            <?= $this->Form->button(__('Update'), ['class' => 'indigo waves-effect waves-light btn', 'id' => 'btnUpdate']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<style>
    .btn {
        margin-top: 2rem;
    }

    .card-content {
        padding-bottom: 3px !important;
    }

    .container {
        margin-top: 1rem;
    }

    .capitalize {
        text-transform: capitalize;
    }

    label {
        color: black;
    }

    th {
        font-family: Raleway !important;
        width: 40%;
    }

    td {
        font-family: 'Open Sans';
    }

    table {
        margin-top: 1rem;
    }

    header {
        background: #eee;
        background-image: url("/img/profile_img/background2.jpeg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-color: teal;
        height: 250px;
    }

    main {
        padding: 20px 20px 0px 20px;
    }

    .left {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .photo {
        width: 200px;
        height: 200px;
        margin-top: -120px;
        border-radius: 100px;
        border: 4px solid #fff;
    }
</style>

<script>
    $("#btnUpdate").click(function() {
        var user_type = $('input[name=type]:checked').val();
        var a = $("#usertype").val(user_type);
    });
</script>