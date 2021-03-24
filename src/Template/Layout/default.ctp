<?php

use Cake\Controller\Component\AuthComponent;

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'PRS';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <!-- <?= $this->Html->meta('icon') ?> 
     <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?> -->

    <?= $this->Html->css('materialize.min.css') ?>
    <?= $this->Html->script('jquery-3.5.1.min.js') ?>
    <?= $this->Html->script('fusioncharts/fusioncharts.js') ?>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" /> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <!-- <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="blue-grey lighten-5">
    <!-- default -->
    <!-- <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav> -->

    <!-- fixed nav -->
    <!-- <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">Logo</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                </ul>
            </div>
        </nav>
    </div> -->

    <nav>
        <div class="nav-wrapper indigo z-depth-1">
            <a href=" <?= ($user['id']) ? '/data_analysis' : '' ?> " class="brand-logo center">PRS</a>
            <?php if ($user['id']) : ?>
                <a href="#" data-target="slide-out" class="sidenav-trigger left show-on-large">
                    <i class="material-icons">menu</i>
                </a>
            <?php endif ?>
            <!-- notification -->
            <!-- <ul id="nav-mobile" class="left hide-on-med-and-down right">
                 <li><a href="#" class="badge1" data-badge="27"><i class="material-icons left">notifications</i></a></li> 
            </ul>-->
        </div>
    </nav>

    <!-- side nav -->
    <?php if ($user['id']) : ?>
        <ul id="slide-out" class="sidenav">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img width="300" height="500" src="/img/profile_img/background.jpg">
                    </div>
                    <a><img class="circle" src="<?= ($user['profile_img']) ? '/img/profile_img/' . $user['profile_img'] : '/img/profile_img/default.png'  ?>"></a>
                    <a><span class="white-text name"><?= $user['name'] ?></span></a>
                    <a><span class="white-text email"><?= $user['email'] ?></span></a>
                </div>
            </li>
            <!-- <li><a class="subheader">Profile</a></li> -->
            <li><a href="/view_user/<?= $user['id'] ?>"><i class="material-icons teal-text">person</i>My Profile</a></li>
            <li><a href="/edit_user/<?= $user['id'] ?>"><i class="material-icons grey-text text-darken-2">edit</i>Update Profile</a></li>
            <!-- <li><a class="subheader">Others</a></li> -->
            <li><a class="waves-effect" href="/user/prizes"><i class="material-icons yellow-text text-darken-2">monetization_on</i>Scores & Awards</a></li>
            <li><a class="waves-effect" href="/notifications"><i class="material-icons green-text">local_play</i>Surveys</a></li>
            <li><a class="waves-effect" href="/answers"><i class="material-icons blue-text text-darken-2">pages</i>Surveys History</a></li>
            <li><a class="waves-effect" href="/logout"><i class="material-icons red-text">exit_to_app</i>Logout</a></li>
        </ul>
    <?php endif ?>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <!--JavaScript at end of body for optimized loading-->
    <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
    <?= $this->Html->script('materialize.min.js') ?>
</body>

</html>

<script>
    $(document).ready(function() {
        $('.sidenav').sidenav();
    });
</script>

<style>
    .badge1 {
        position: relative;
    }

    .badge1[data-badge]:after {
        content: attr(data-badge);
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: .7em;
        background: red;
        color: white;
        width: 18px;
        height: 18px;
        text-align: center;
        line-height: 18px;
        border-radius: 50%;
        box-shadow: 0 0 1px #333;
    }

    .error-alert {
        padding: 10px;
        background-color: #F78181;
        color: white;
    }

    .success-alert {
        padding: 10px;
        background-color: #3CC099;
        color: white;
    }

    .warning-alert {
        padding: 10px;
        background-color: #FFBB34;
        color: white;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }

    div.message {
        text-align: center !important;
        cursor: pointer;
        display: block;
        font-weight: normal !important;
        padding: 0 1.5rem 0 1.5rem;
        transition: height 300ms ease-out 0s;
        background-color: #a0d3e8;
        color: #626262;
        top: 15px;
        right: 15px;
        z-index: 999;
        overflow: hidden;
        height: 50px;
        line-height: 3.2em;
        margin-bottom: 0px !important;
        margin-top: 0px !important;
    }

    /*     div.message:before {
        line-height: 0px;
        font-size: 20px;
        height: 12px;
        width: 12px;
        border-radius: 15px;
        text-align: center;
        vertical-align: middle;
        display: inline-block;
        position: relative;
        left: -11px;
        background-color: #FFF;
        padding: 12px 14px 12px 10px;
        content: "i";
        color: #a0d3e8;
    } */

    div.message.error {
        background-color: #F78181;
        color: #FFF;
    }

    /*     div.message.error:before {
        padding: 11px 16px 14px 7px;
        color: #C3232D;
        content: "x";
    } */

    div.message.success {
        background-color: #3CC099;
        color: #FFF;
    }

    /*     div.message.success:before {
        padding: 11px 16px 14px 7px;
        color: #C3232D;
        content: "✓";
    } */

    div.message.hidden {
        height: 0;
    }
</style>