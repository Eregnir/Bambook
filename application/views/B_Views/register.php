        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width portfolio-contact">
                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Register to Bambook</h2>
                    </div>
                    <div class="mdl-card__media text-center" style="background-color: #fff;">
                        <video width="100%" height="315" controls autoplay>
                            <source src="<?php echo base_url('images/bambook-vid.mp4');?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="mdl-card__supporting-text text-center">
                        <p>
                            <h2>Hi there reader, and welcome to Bambook!</h2>
                            Aren't books just great? We think so too, thats why we created Bambook:<br> 
                            your online social book swapping platform.
                        </p>
                        <p>
                            So what are you waiting for? join the Bambook train and get swapping!
                        </p>
                        <p style="color:red">
                            <?php if (isset($err)){print_r($err);}?>
                        </p>
                        <!-- Registration Form -->

                        <form method="post" action="<?php echo site_url('Intro/new_user');?>" class="">
                        <!-- First Name -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input required class="mdl-textfield__input" pattern="[A-Z,a-z, ]*" type="text" id="firstName" name="firstName">
                                <label class="mdl-textfield__label" for="firstName">First Name...</label>
                                <span class="mdl-textfield__error">Must contain letters and spaces only</span>
                            </div>
                        <!-- Last Name -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input required class="mdl-textfield__input" pattern="[A-Z,a-z, ]*" type="text" id="lastName" name="lastName">
                                <label class="mdl-textfield__label" for="lastName">Last Name...</label>
                                <span class="mdl-textfield__error">Must contain letters and spaces only</span>
                            </div>
                        <!-- Username -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input required class="mdl-textfield__input" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{2,15}$" type="text" id="username" name="username">
                                <label class="mdl-textfield__label" for="username">Username...</label>
                                <span class="mdl-textfield__error">Must start with a letter and contain 3-20 characters</span>
                            </div>
                        <!-- email address -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input required class="mdl-textfield__input" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" type="text" id="email" name="email">
                                <label class="mdl-textfield__label" for="email">Email...</label>
                                <span class="mdl-textfield__error">Must contain a valid email</span>
                            </div>
                        <!-- Phone Number -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input required class="mdl-textfield__input" pattern=".{10,15}" type="tel" id="phone_num" name="phone_num">
                                <label class="mdl-textfield__label" for="phone_num">Phone Number...</label>
                                <span class="mdl-textfield__error">Must contain a valid phone number</span>
                            </div>
                        <!-- Password -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input required class="mdl-textfield__input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" id="password" name="password">
                                <label class="mdl-textfield__label" for="password">Password...</label>
                                <span class="mdl-textfield__error">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>
                            </div>
                            <br><br>
                            <!-- Need to add password validation -->
                            <p>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="submit" name="submit ">
                                    Submit
                                </button>
                            </p>
                        </form>

                    </div>
                </div>
            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script>
    window.onload = function(){
        var active = document.getElementById("rgs");
        active.classList.add("is-active");
        }
    </script>
