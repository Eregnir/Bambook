        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width portfolio-contact">
                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Login to Bambook</h2>
                    </div>
                    <div class="mdl-card__media">
                        <img class="article-image" src="<?php echo base_url('images/children-reading.png');?>" border="0" alt="">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>
                            Welcome Back to Bambook!
                        </p>
                        <p>
                            Not a member yet? come read with us!
                            <center><br>
                                <button id="register" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="button" name="register">
                                        Register
                                    </button>
                            </center>
                        </p>
                        <p style="color:crimson;">
                        <?php 
                            if ($error!=null){echo $error['error'];};
                        ?>
                        </p>
                        </p>
                        <center>
                            <p>
                            <?php 
                                if ($reg!=null){print_r($reg);};
                            ?>
                            </p>
                        </center>
                        
                        <!-- Login Form -->

                        <form method="post" action="<?php echo site_url('Users/auth');?>" class="">
                        <!-- Username -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="username" name="username">
                                <label class="mdl-textfield__label" for="username">Username...</label>
                            </div>
                        <!-- Password -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" id="password" name="password">
                                <label class="mdl-textfield__label" for="password">Password...</label>
                            </div>
                            <br><br>
                            <!-- Need to add password validation -->
                            <p>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="submit ">
                                    Login
                                </button>
                            </p>
                        </form>

                    </div>
                </div>
            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script>
    window.onload = function(){
        var active = document.getElementById("log");
        active.classList.add("is-active");
        }

    document.getElementById("register").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/register');?>";   
    };
    </script>
