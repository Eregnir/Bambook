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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css');?> " />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                    <a id="abt" class="mdl-navigation__link" href="#">About</a>
                    <a id="cnt" class="mdl-navigation__link" href="">Contact</a>
                    <a class="mdl-navigation__link is-active" href="<?php echo site_url('Intro/register');?>">Register</a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer mdl-layout--small-screen-only">
            <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font">
                <a class="mdl-navigation__link" href="<?php echo site_url('Intro/index');?>">Homepage</a>
                <a class="mdl-navigation__link" href="<?php echo site_url('Intro/blog');?>">Blog</a>
                <a class="mdl-navigation__link" href="<?php echo site_url('Intro/about');?>">About</a>
                <a class="mdl-navigation__link" href="<?php echo site_url('Intro/contact');?>">Contact</a>
                <a class="mdl-navigation__link is-active" href="<?php echo site_url('Intro/register');?>">Register</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width portfolio-contact">
                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Register to Bambook</h2>
                    </div>
                    <div class="mdl-card__media">
                        <img class="article-image" src="<?php echo base_url('images/children-reading.png');?>" border="0" alt="">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>
                            This text will welcome the new user to Bambook
                        </p>
                        <p>
                            And this text as well.
                        </p>
                        <!-- Registration Form -->
                        <form action="#" class="">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" pattern="[A-Z,a-z, ]*" type="text" id="Name">
                                <label class="mdl-textfield__label" for="firstName">First Name...</label>
                                <span class="mdl-textfield__error">Letters and spaces only</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" pattern="[A-Z,a-z, ]*" type="text" id="Name">
                                <label class="mdl-textfield__label" for="lastName">Last Name...</label>
                                <span class="mdl-textfield__error">Letters and spaces only</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{2,15}$" type="text" id="Name">
                                <label class="mdl-textfield__label" for="username">Username...</label>
                                <span class="mdl-textfield__error">Username must contain 3-20 characters</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="Email">
                                <label class="mdl-textfield__label" for="Email">Email...</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="text" id="Name">
                                <label class="mdl-textfield__label" for="username">Password...</label>
                                <span class="mdl-textfield__error">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>
                            </div>
                            <br><br>
                            <!-- Need to add password validation -->
                            <p>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">
                                    Submit
                                </button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo">Simple portfolio website</div>
                </div>
                <div class="mdl-mini-footer__right-section">
                    <ul class="mdl-mini-footer__link-list">
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Privacy & Terms</a></li>
                    </ul>
                </div>
            </footer>
        </main>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<script>
    document.getElementById("ind").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/index');?>";   
    };

    document.getElementById("blg").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/blog');?>";   
    };

    document.getElementById("abt").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/about');?>";   
    };

    document.getElementById("cnt").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/contact');?>";   
    };
</script>
</body>

</html>
