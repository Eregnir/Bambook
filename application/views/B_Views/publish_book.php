        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset"> <!-- centered div -->
                <!-- Form publish a book -->
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                            <form class="needs-validation" novalidate>
                                <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" id="name" placeholder="Your name" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please add a name.
                                </div>
                                </div>

                                <div class="form-group">
                                <label for="telephone">Telephone*</label>
                                <input type="text" class="form-control" id="telephone" placeholder="Your telephone number" required minlength="7" maxlength="12">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a valid telephone number (between 7 and 10 characters).
                                </div>
                                </div>

                                <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Your delivery address" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please add an address.
                                </div>
                                </div>

                                <div class="form-group">
                                <select class="custom-select" required>
                                    <option value="">Select a menu*</option>
                                    <option value="1">Breakfast</option>
                                    <option value="2">Lunch</option>
                                    <option value="3">Dinner</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a menu.
                                </div>
                                </div>

                                <div class="form-group">
                                <label>I need cutlery:</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="yes" name="cutlery" class="custom-control-input" required>
                                    <label class="custom-control-label" for="yes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="no" name="cutlery" class="custom-control-input" required>
                                    <label class="custom-control-label" for="no">No</label>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please specify if you need cutlery.
                                    </div>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
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

    <!-- Validation for errors -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>
