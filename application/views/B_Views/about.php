        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">

                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <!-- <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Profile</h2>
                    </div>
                    <div class="mdl-card__media">
                        <img class="article-image" src="<?php echo base_url('images/about-header.jpg');?>" border="0" alt="">
                    </div> -->

                    <div class="mdl-grid portfolio-copy">
                        <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline"><u>My Profile:</u></h3>
                        <div class="mdl-cell mdl-cell--8-col mdl-card__supporting-text no-padding ">
                            <p>
                            <h4><br>Hello, <?php foreach ($profile as $prof){echo $prof->username;}?>! </h4><br>
                            <?php foreach ($profile as $prof){echo '<center><img style="max-height:200px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $prof->img).'"/>';}?>
                                    <br><br><button style="margin-left:10px;" id="avatar" class="mdl-button mdl-js-button mdl-button--raised " type="button" name="avatar">
                                        Change Avatar
                                    </button></center>
                                    <h5>
                                        <br><br><b>Name:</b> <?php foreach ($profile as $prof){echo $prof->f_name." ". $prof->l_name;}?>
                                        <br><br><b>Email:</b> <?php foreach ($profile as $prof){echo $prof->email;}?>
                                        <br><br><b>Phone Number:</b> <?php foreach ($profile as $prof){echo $prof->phone_num;}?>
                                    </h5>
                                    <h6>We will never share your number without your concent.</h6>

                            </p>
                        </div>


                        <hr style="width:95%;">

                        <br><u><br><h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">Book Swap Preferences:</h3></u>   
                        <div style="display:'';" id="bsp" class="mdl-cell mdl-cell--8-col mdl-card__supporting-text no-padding ">
                            <p>
                                <h5>
                                    <b>Favorite Genres:</b> 
                                    <?php foreach ($profile as $prof){
                                        if($prof->genre1!=null){echo $prof->genre1;}
                                        if($prof->genre2!=null){echo ", ".$prof->genre2;}
                                        if($prof->genre3!=null){echo ", ". $prof->genre3;}
                                        }?>
                                    <br><br><b>Location:</b> <?php foreach ($profile as $prof){echo $prof->location;}?>
                                </h5>
                            </p>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Edit Info</button>
                        </div>

                        <div style="display:none;" id="bspe" class="mdl-cell mdl-cell--8-col mdl-card__supporting-text no-padding ">
                        
                            <!-- Edit info Form -->

                            <form method="post" action="<?php echo site_url('Users/update_pref');?>" class="">
                            <!-- Favorite Genre 1 -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input value="<?php foreach ($profile as $prof){if($prof->genre1!=null){echo $prof->genre1;}}?>" class="mdl-textfield__input" type="text" id="genre1" name="genre1">
                                    <label class="mdl-textfield__label" for="genre1">Genre 1</label>
                                </div>
                            <!-- Favorite Genre 2 -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input value="<?php foreach ($profile as $prof){if($prof->genre2!=null){echo $prof->genre2;}}?>" class="mdl-textfield__input" type="text" id="genre2" name="genre2">
                                    <label class="mdl-textfield__label" for="genre2">Genre 2</label>
                                </div>
                            <!-- Favorite Genre 3 -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input value="<?php foreach ($profile as $prof){if($prof->genre3!=null){echo $prof->genre3;}}?>" class="mdl-textfield__input" type="text" id="genre3" name="genre3">
                                    <label class="mdl-textfield__label" for="genre3">Genre 3</label>
                                </div>
                            <!-- User Location -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input value="<?php foreach ($profile as $prof){if($prof->location!=null){echo $prof->location;}}?>" class="mdl-textfield__input" type="text" id="location" name="location">
                                    <label class="mdl-textfield__label" for="location">Location</label>
                                </div>
                                <br><br>
                                <p>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="submit" name="submit ">
                                        Submit Changes
                                    </button>
                                    <button style="margin-left:10px;" id="cancel" class="mdl-button mdl-js-button mdl-button--raised" type="button" name="cancel">
                                        Cancel
                                    </button>
                                </p>
                            </form>
                            

                        </div>

                        <!-- Location API: -->
                        <button onclick="getLocation()">Try It</button>
                        <p id="demo"></p>
                        
                    </div>
                </div>

            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script>
    window.onload = function(){
        var active = document.getElementById("abt");
        active.classList.add("is-active");
        }
    
    document.getElementById("bsp").onclick=function()
    {
        document.getElementById("bspe").style.display = ""; 
        document.getElementById('bsp').style.display = "none";
    };

    document.getElementById("cancel").onclick=function()
    {
        document.getElementById("bsp").style.display = ""; 
        document.getElementById('bspe').style.display = "none";
    };

    document.getElementById("avatar").onclick=function()
    {
        window.location.href="<?php echo site_url('Users/show_avatars');?>";
    };

    var x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    } 
    function showPosition(position) {
        x.innerHTML="Latitude: " + position.coords.latitude + 
        "<br>Longitude: " + position.coords.longitude;
    }
    </script>

