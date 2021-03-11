<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

use Cake\Http\Client\FormData;

?>
<!-- <a class="waves-effect waves-light indigo btn right" href="/users/index">User List</a> -->

<div style="margin-left: 15%;">
    <div class="users view large-9 medium-8 columns content">
        <fieldset class="col s8">
            <legend>
                <h4>Profile</h4>
            </legend>

            <?php if (!empty($user->profile_img)) { ?>
                <?php echo $this->Html->image('profile_img/' . $user->profile_img, array('width' => '120px', 'height' => '120px', 'alt' => $user->profile_img)); ?>
            <?php } else { ?>
                <?php echo $this->Html->image('profile_img/default.png', array('width' => '120px', 'height' => '120px', 'alt' => $user->profile_img)); ?>
            <?php } ?>

            <table>
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>

                <tr>
                    <th scope="row"><?= __('Gender') ?></th>
                    <td><?= h($user->gender) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Birthdate') ?></th>
                    <td><?= h($user->birthdate->i18nFormat('YYY-MM-dd')) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Age') ?></th>
                    <td><?= $this->Number->format($user->age) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Phone') ?></th>
                    <td><?= h($user->phone) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Premium Flg') ?></th>
                    <td><?= h($user->premium_flg) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Reward') ?></th>
                    <td><?= h($user->reward) ?></td>
                </tr>
            </table>
        </fieldset>

    </div>
</div>