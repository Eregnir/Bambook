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

                        <form method="post" action="<?php echo site_url('Intro/new_user');?>" class="">
                        <!-- First Name -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" pattern="[A-Z,a-z, ]*" type="text" id="firstName" name="firstName">
                                <label class="mdl-textfield__label" for="firstName">First Name...</label>
                                <span class="mdl-textfield__error">Must contain letters and spaces only</span>
                            </div>
                        <!-- Last Name -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" pattern="[A-Z,a-z, ]*" type="text" id="lastName" name="lastName">
                                <label class="mdl-textfield__label" for="lastName">Last Name...</label>
                                <span class="mdl-textfield__error">Must contain letters and spaces only</span>
                            </div>
                        <!-- Username -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{2,15}$" type="text" id="username" name="username">
                                <label class="mdl-textfield__label" for="username">Username...</label>
                                <span class="mdl-textfield__error">Must contain 3-20 characters</span>
                            </div>
                        <!-- email address -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="email" name="email">
                                <label class="mdl-textfield__label" for="email">Email...</label>
                            </div>
                        <!-- Password -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="text" id="password" name="password">
                                <label class="mdl-textfield__label" for="password">Password...</label>
                                <span class="mdl-textfield__error">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>
                            </div>
                            <br><br>
                            <!-- Need to add password validation -->
                            <p>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="submit ">
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
    window.onload = function(){
        var active = document.getElementById("rgs");
        active.classList.add("is-active");
        }
    </script>
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
