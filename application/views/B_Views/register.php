        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width portfolio-contact">
                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Register to Bambook</h2>
                    </div>
                    <div class="mdl-card__media text-center" style="background-color: #fff;">
                        <video controls autoplay>
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

                        <form method="post" action="<?php echo site_url('Intro/new_user');?>" class="" id="register">
                        <!-- First Name -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="firstName" name="firstName">
                                <label class="mdl-textfield__label" for="firstName">First Name...</label>
                                <span class="mdl-textfield__error">Must contain letters and spaces only</span>
                            </div>
                            <!-- first name pattern
                        pattern="[A-Z,a-z, ]*"-->
                        <!-- Last Name -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="lastName" name="lastName">
                                <label class="mdl-textfield__label" for="lastName">Last Name...</label>
                                <span class="mdl-textfield__error">Must contain letters and spaces only</span>
                            </div>
                            <!-- last name pattern 
                        pattern="[A-Z,a-z, ]*"-->
                        <!-- Username -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="username" name="username">
                                <label class="mdl-textfield__label" for="username">Username...</label>
                                <span class="mdl-textfield__error">Must start with a letter and contain 3-20 characters</span>
                            </div>
                            <!-- username pattern 
                        pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{2,15}$" -->
                        <!-- email address -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="email" name="email">
                                <label class="mdl-textfield__label" for="email">Email...</label>
                                <span class="mdl-textfield__error">Must contain a valid email</span>
                            </div>
                            <!-- email patterns
                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" -->
                        <!-- Phone Number -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="tel" id="phone_num" name="phone_num">
                                <label class="mdl-textfield__label" for="phone_num">Phone Number...</label>
                                <span class="mdl-textfield__error">Must contain a valid phone number</span>
                            </div>
                            <!-- phone pattern 
                        pattern=".{10,15}" -->
                        <!-- Password -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" id="password" name="password">
                                <label class="mdl-textfield__label" for="password">Password...</label>
                                <span class="mdl-textfield__error">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>
                            </div>
                            <!-- password pattern
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->
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

    // Registration Form validation function
    const regForm = document.querySelector('form#register');
    const errors_el = document.querySelector('form#register .errors');
    
    regForm.addEventListener('submit', validateRegisterForm);

    function validateRegisterForm (e) {
        e.preventDefault();
        
        const firstname = document.querySelector('#register #firstName');
        const lastname = document.querySelector('#register #lastName');
        const username = document.querySelector('#register #username');
        const email = document.querySelector('#register #email');
        const phone = document.querySelector('#register #phone_num');
        const password = document.querySelector('#register #password');
        
        let errors = [];

        const firstname_reg = /^([A-Z,a-z, ]*)/;
        const lastname_reg = /^([A-Z,a-z, ]*)/;
        const user_reg = /^([a-zA-Z][a-zA-Z0-9-_\.]{2,15}$)/;
        const email_reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        const phone_reg = /^({10,15})/;
        const pass_reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

        if (firstname.value == "") {
            errors.push({text: "first name", el: firstname});
        }
        
        if (lastname.value == "") {
            errors.push({text: "lastname", el: lastname});
        }
        
        if (email.value == "") {
            errors.push({text: "email", el: email});
        }

        if (phone.value == "") {
            errors.push({text: "phone", el: phone});
        }

        if (username.value == "") {
            errors.push({text: "username", el: username});
        }

        else if (!email_reg.test(email.value)) {
            errors.push({text: "email", el: email});
        }
        
        if (password.value == "") {
            errors.push({text: "password", el: password});
        } 
        else if (!pass_reg.test(password.value)) {
            errors.push({text: "password", el: password});
        }
        
        if (errors.length > 0) {
            handle_errors(errors);
            return false;
        }
        
        alert('You have registered successfully!');
        return true;
        }

        function handle_errors(errs) {
            let str = "You have errors with the following fields; ";
        
        errs.map((er) => {
            er.el.classList.add('error');
            str += er.text + ", ";
        });
        
        errs[0].el.focus();
        
        let error_el = document.createElement('div');
        error_el.classList.add('error');
        error_el.innerText = str;
        
        error_el.addEventListener('click', function () {
            errors_el.removeChild(error_el);
        });
        
        errors_el.appendChild(error_el);
        }
 
    </script>
