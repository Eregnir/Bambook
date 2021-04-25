        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset"> <!-- centered div -->
                <!-- Form publish a book -->
                    <div class="container">
                        <div class="row">
                            <div class="offset-lg-2 col-lg-8 col-sm-8 col-8 border rounded main-section">
                                <h3 class="text-center text-inverse">Form Validation</h3>
                                <hr>
                                <form class="container" id="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label class="text-inverse" for="validationCustom01">First Name</label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="First Name" required>
                                    </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label class="text-inverse" for="validationCustom02">Last Name</label>
                                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Last Name" required>
                                    </div>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-inverse" for="inputEmail4">Email</label>
                                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
                                        <div class="invalid-feedback">
                                        Please provide a valid Email.
                                        </div>
                                    </div>  
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label class="text-inverse" for="inputpassword">Password</label>
                                        <input type="password" class="form-control" id="inputpassword" placeholder="password" required>
                                        <div class="invalid-feedback">
                                        Please provide a valid password.
                                        </div>
                                    </div>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label class="text-inverse" for="validationCustom03">City</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                        <div class="invalid-feedback">
                                        Please provide a valid city.
                                        </div>
                                    </div>  
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label class="text-inverse" for="select-menu">Select any value</label>
                                        <select class="custom-select d-block form-control" id="image" required>
                                        <option value="">Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        </select>
                                        <div class="invalid-feedback">
                                        Please selected any option.
                                        </div>
                                    </div>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label class="custom-file">
                                        <input type="file" id="file" class="form-control custom-file-input" required>
                                        <span class="custom-file-control"></span>
                                        <div class="invalid-feedback">
                                            Please selected any File.
                                        </div>
                                        </label>
                                    </div>  
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Check this custom checkbox</span>
                                        </label>
                                    </div>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label class="custom-control custom-radio">
                                        <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input" required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Toggle this custom radio</span>
                                        </label>
                                    </div>  
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label class="custom-control custom-radio">
                                        <input id="radioStacked2" name="radio-stacked" type="radio" class="custom-control-input" required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Or toggle this other custom radio</span>
                                        </label>
                                    </div>  
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center">
                                        <button class="btn btn-info" type="submit">Submit form</button>
                                    </div>
                                </div>  
                                </form>
                            </div>
                        </div>  
                    </div>
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

    <!-- Form Validation -->
    <script>
          (function() {
            'use strict';
            window.addEventListener('load', function() {
            var form = document.getElementById('needs-validation');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            }, false);
        })();
    </script>