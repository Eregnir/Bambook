<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A portfolio template that uses Material Design Lite.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Bambook</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-pink.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/styles.css');?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" href="images/favicon.png" type="image/png">  
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header mdl-layout__header--waterfall portfolio-header">
            <div class="mdl-layout__header-row portfolio-logo-row">
                <span class="mdl-layout__title">
                    <div class="portfolio-logo"></div>
                    <span class="mdl-layout__title">Bambook - Book Swap</span>
                </span>
            </div>
            <div class="mdl-layout__header-row portfolio-navigation-row mdl-layout--large-screen-only">
                <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font">
                    <a id="ind" class="mdl-navigation__link" href="#">Homepage</a>
                    <a id="blg" class="mdl-navigation__link" href="#">Blog</a>
                    <a id="abt" class="mdl-navigation__link" href="#">Profile</a>
                    <a id="cnt" class="mdl-navigation__link" href="#">Contact</a>
                    <a id="rgs" class="mdl-navigation__link" href="<?php echo site_url('Intro/register');?>">Register</a>
                    <a id="log" class="mdl-navigation__link" href="<?php echo site_url('Intro/login');?>">Login</a>

                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer mdl-layout--small-screen-only">
            <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font">
                    <a class="mdl-navigation__link is-active" href="<?php echo site_url('Intro/index');?>">Homepage</a>
                    <a class="mdl-navigation__link" href="<?php echo site_url('Intro/blog');?>">Blog</a>
                    <a class="mdl-navigation__link" href="<?php echo site_url('Intro/about');?>">Profile</a>
                    <a class="mdl-navigation__link" href="<?php echo site_url('Intro/contact');?>">Contact</a>
                    <a class="mdl-navigation__link" href="<?php echo site_url('Intro/register');?>">Register</a>
                    <a class="mdl-navigation__link" href="<?php echo site_url('Intro/login');?>">Login</a>
            </nav>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>