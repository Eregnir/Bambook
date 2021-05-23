        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-grid portfolio-copy text-center">
                        <h3 class="text-center" style="padding: 15px;">Welcome to Bambook!</h3>
                    </div>
                    <div class="mdl-grid portfolio-copy text-center">
                    <button id="login" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent text-center" type="button" name="login">
                                Login
                            </button>
                    </div><br>
                    <!-- Image card 0 -->
                    <div id="mobile" class="card text-center" style="width: 22em;">
                        <img class="card-img-top" src='<?php echo base_url('images/mobile-only.png');?>' alt="welcome to bambook">
                        <div class="card-body">
                            <p class="card-text">
                                <h4>We've detected you are not using a mobile device to browse Bambook.</h4>
                                Bambook was developed as a mobile Web App! to get the best experience, we recommend you to switch to mobile.<br>
                                You don't have to, but some features might not work for desktop users.
                            </p>
                        </div>
                    </div>
                    <br><br><br>
                    <!-- Image card 1 -->
                    <div class="card text-center" style="width: 22em;">
                        <img class="card-img-top" src='<?php echo base_url('images/about_us_images/1.png');?>' alt="welcome to bambook">
                        <div class="card-body">
                            <p class="card-text">
                                Bambook is an eco-friendly, easy to use platform that allows you to swap books for free with our growing community.<br>
                                With Bambook you can swap your old books with new ones you would like to read.<br><br>
                                After you register to Bambook, you can list the books you own and wish to exchange, and search for books you would like to read.<br>
                                You can request a book swap from the available books that Bambook users have uploaded and suggest the book you would like to trade.
                                If a match is found, both users will be notified so they can arrange the book swap details.<br>
                            </p>
                            <!-- <a href="#" class="btn btn-primary">List a book</a> -->
                        </div>
                    </div>
                    <br><br><br>
                    <!-- Image card 2 -->
                    <div class="card text-center" style="width: 22em;">
                        <img class="card-img-top" src='<?php echo base_url('images/about_us_images/2.png');?>' alt="upload a book">


                        <div class="card-body">
                            <p class="card-text">Upload a book you no longer desire, you can either manually enter the information or scan the book's ISBN number.</p>
                            <!-- <a href="#" class="btn btn-primary">List a book</a> -->
                        </div>
                    </div>
                    <br><br><br>
                    <!-- Image card 3 -->
                    <div class="card text-center" style="width: 22em;">
                        <img class="card-img-top" src='<?php echo base_url('images/about_us_images/3.png');?>' alt="search a book">
                        <div class="card-body">
                            <p class="card-text">Search a book from the available Bambook's library which is growing every single day!</p>
                            <!-- <a href="#" class="btn btn-primary">Search a book</a> -->
                        </div>
                    </div>
                    <br><br><br>
                    <!-- Image card 4 -->
                    <div class="card text-center" style="width: 22em;">
                        <img class="card-img-top" src='<?php echo base_url('images/about_us_images/4.png');?>' alt="request or get a book swap">
                        <div class="card-body">
                            <p class="card-text">Found a book that interest you? Request a swap from the person who listed the book and offer a book instead.<br>
                            <br>Received a request? Accept or decline the swap, if both sides agree (yay!), arrange the book swap details!</p>
                            <!-- <a href="#" class="btn btn-primary">Request or get a swap</a> -->
                        </div>
                    </div>
                    <br><br><br>
                    <!-- Image card 5 -->
                    <div class="card text-center" style="width: 22em;">
                        <img class="card-img-top" src='<?php echo base_url('images/about_us_images/5.png');?>' alt="read a book">
                        <div class="card-body">
                            <p class="card-text">Finished your Bambook Swap? Start reading your new book! Happy reading 😊</p>
                            <!-- <a href="#" class="btn btn-primary">Read</a> -->
                        </div>
                    </div>
                    <br><br>
                    <div class="center-align">
                        <h3 class="text-center">Sounds interesting? Log in or join us today!</h3><br>
                        <div class="text-center">
                            <button id="login1" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="button" name="login">
                                Login
                            </button> 
                            <button id="register" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="button" name="register">
                                Register
                            </button>
                            <br><br>
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
        
    document.getElementById("register").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/register');?>";   
    };
    document.getElementById("login").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/login');?>";   
    };
    document.getElementById("login1").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/login');?>";   
    };

    window.onload = function(){
        var mobile = document.getElementById("mobile");
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        // true for mobile device
        mobile.classList.add("hidden");
        }
        else{
            mobile.classList.add("card");
        }
        
    }
    
    </script>