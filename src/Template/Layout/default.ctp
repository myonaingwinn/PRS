<?php

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
    <!-- <?= $this->Html->meta('icon') ?> -->
    <!-- <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?> -->

    <?= $this->Html->css('materialize.min.css') ?>
    <?= $this->Html->script('jquery-3.5.1.min.js') ?>

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
            <a href="#" class="brand-logo center">PRS</a>
            <a href="#" data-target="slide-out" class="sidenav-trigger left show-on-large">
                <i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="left hide-on-med-and-down right">
                <!-- <li><a href="#" data-target="slide-out" class="sidenav-trigger">
                        <i class="material-icons">menu</i></a></li> -->
                <!-- <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li> -->
                <li><a href="#" class="badge1" data-badge="27"><i class="material-icons left">notifications</i></a></li>
            </ul>
        </div>
    </nav>

    <!-- side nav -->
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background">
                    <img width="300" height="500" src="https://wallpapercave.com/wp/wp5086278.jpg">
                </div>
                <a href="#user"><img class="circle" src="http://1.bp.blogspot.com/-oFBZLSILB48/TdV-TLATY1I/AAAAAAAACQE/2GUcBagIPWc/s1600/Liu+Yifei+%25286%2529.jpg"></a>
                <a href="#name"><span class="white-text name">John Doe</span></a>
                <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div>
        </li>
        <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
        <li><a href="#!">Second Link</a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader">Subheader</a></li>
        <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    </ul>


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
</style>