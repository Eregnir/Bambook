        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset"> <!-- centered div -->
                <!-- Form publish a book -->
                    <form id="basicBootstrapForm" class="form-horizontal"
                        data-fv-framework="bootstrap"
                        data-fv-icon-valid="glyphicon glyphicon-ok"
                        data-fv-icon-invalid="glyphicon glyphicon-remove"
                        data-fv-icon-validating="glyphicon glyphicon-refresh">

                        <div class="form-group">
                            <label class="col-xs-3 control-label">First name</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" name="firstName" placeholder="First name"
                                    data-fv-row=".col-xs-4"
                                    data-fv-notempty="true"
                                    data-fv-notempty-message="The first name is required" />
                            </div>

                            <div class="col-xs-4">
                            <label class="col-xs-3 control-label">Last name</label>
                                <input type="text" class="form-control" name="lastName" placeholder="Last name"
                                    data-fv-row=".col-xs-4"
                                    data-fv-notempty="true"
                                    data-fv-notempty-message="The last name is required" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">Username</label>
                            <div class="col-xs-5">
                                <input type="text" class="form-control" name="username"
                                    data-fv-notempty="true"
                                    data-fv-notempty-message="The username is required"

                                    data-fv-stringlength="true"
                                    data-fv-stringlength-min="6"
                                    data-fv-stringlength-max="30"
                                    data-fv-stringlength-message="The username must be more than 6 and less than 30 characters long"

                                    data-fv-regexp="true"
                                    data-fv-regexp-regexp="^[a-zA-Z0-9_\.]+$"
                                    data-fv-regexp-message="The username can only consist of alphabetical, number, dot and underscore" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">Email address</label>
                            <div class="col-xs-5">
                                <input type="text" class="form-control" name="email"
                                    data-fv-notempty="true"
                                    data-fv-notempty-message="The email address is required"

                                    data-fv-emailaddress="true"
                                    data-fv-emailaddress-message="The input is not a valid email address" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">Password</label>
                            <div class="col-xs-5">
                                <input type="password" class="form-control" name="password"
                                    data-fv-notempty="true"
                                    data-fv-notempty-message="The password is required"

                                    data-fv-different="true"
                                    data-fv-different-field="username"
                                    data-fv-different-message="The password cannot be the same as username" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">Gender</label>
                            <div class="col-xs-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="male"
                                            data-fv-notempty="true"
                                            data-fv-notempty-message="The gender is required" /> Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="female" /> Female
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="other" /> Other
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label" id="captchaOperation"></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" name="captcha"
                                    data-fv-callback="true"
                                    data-fv-callback-callback="checkCaptcha"
                                    data-fv-callback-message="Wrong answer" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6 col-xs-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="agree" value="agree"
                                            data-fv-notempty="true"
                                            data-fv-notempty-message="You must agree with the terms and conditions" /> Agree with the terms and conditions
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-9 col-xs-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    <script>
    window.onload = function(){
        var active = document.getElementById("ind");
        active.classList.add("is-active");
        }
    </script>

    <script>
        // Form validation scripts
        // Check the captcha
        function checkCaptcha(value, validator, $field) {
            var items = $('#captchaOperation').html().split(' '),
                sum   = parseInt(items[0]) + parseInt(items[2]);
            return value == sum;
        }

        $(document).ready(function() {
            // Generate a simple captcha
            function randomNumber(min, max) {
                return Math.floor(Math.random() * (max - min + 1) + min);
            }
            $('#captchaOperation').html([randomNumber(1, 10), '+', randomNumber(1, 5), '='].join(' '));

            $('#basicBootstrapForm').formValidation();
        });

    </script>