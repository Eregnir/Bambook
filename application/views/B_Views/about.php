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
                                        if($prof->genre3!=null){echo ", ".$prof->genre3;}
                                        if($prof->genre4!=null){echo ", ".$prof->genre4;}
                                        if($prof->genre5!=null){echo ", ".$prof->genre5;}
                                        if($prof->genre6!=null){echo ", ".$prof->genre6;}
                                        if($prof->genre7!=null){echo ", ".$prof->genre7;}
                                        }?>
                                    <br><br><b>Location:</b> <?php foreach ($profile as $prof){echo $prof->location;}?>
                                </h5>
                            </p>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Edit Preferences</button>
                        </div>

                        <div style="display:none;" id="bspe" class="mdl-cell mdl-cell--8-col mdl-card__supporting-text no-padding ">
                        
                            <!-- Edit info Form -->

                            <form method="post" action="<?php echo site_url('Users/update_pref');?>" class="">
                                <div>
                                    <h5><b>Favorite Genres:</b></h5>
                                </div>
                            <!-- Favorite Genre 1 -->
                                <div>
                                    <input value="<?php foreach ($profile as $prof){if($prof->genre1!=null){echo $prof->genre1;}}?>" class="mdl-checkbox__input" type="checkbox" id="genre1" name="genre1">
                                    <label class="mdl-checkbox__label" for="genre1">Fantasy</label>
                                </div>
                            <!-- Favorite Genre 2 -->
                                <div>
                                    <input value="<?php foreach ($profile as $prof){if($prof->genre2!=null){echo $prof->genre2;}}?>" class="mdl-checkbox__input" type="checkbox" id="genre2" name="genre2">
                                    <label class="mdl-checkbox__label" for="genre2">Mystery</label>
                                </div>
                            <!-- Favorite Genre 3 -->
                                <div>
                                    <input value="<?php foreach ($profile as $prof){if($prof->genre3!=null){echo $prof->genre3;}}?>" class="mdl-checkbox__input" type="checkbox" id="genre3" name="genre3">
                                    <label class="mdl-checkbox__label" for="genre3">Romance</label>
                                </div>
                            <!-- Favorite Genre 4 -->
                                <div>
                                    <input value="<?php foreach ($profile as $prof){if($prof->genre4!=null){echo $prof->genre4;}}?>" class="mdl-checkbox__input" type="checkbox" id="genre4" name="genre4">
                                    <label class="mdl-checkbox__label" for="genre4">Thrillers</label>
                                </div>
                                <!-- Favorite Genre 5 -->
                                <div>
                                    <input value="<?php foreach ($profile as $prof){if($prof->genre5!=null){echo $prof->genre5;}}?>" class="mdl-checkbox__input" type="checkbox" id="genre5" name="genre5">
                                    <label class="mdl-checkbox__label" for="genre5">Biography</label>
                                </div>
                                <!-- Favorite Genre 6 -->
                                <div>
                                    <input value="<?php foreach ($profile as $prof){if($prof->genre6!=null){echo $prof->genre6;}}?>" class="mdl-checkbox__input" type="checkbox" id="genre6" name="genre6">
                                    <label class="mdl-checkbox__label" for="genre6">Inspirational</label>
                                </div>
                                <!-- Favorite Genre 7 -->
                                <div>
                                    <input value="<?php foreach ($profile as $prof){if($prof->genre7!=null){echo $prof->genre7;}}?>" class="mdl-checkbox__input" type="checkbox" id="genre7" name="genre7">
                                    <label class="mdl-checkbox__label" for="genre7">Other</label>
                                </div>
                            <!-- User Location -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input value="<?php foreach ($profile as $prof){if($prof->location!=null){echo $prof->location;}}?>" class="mdl-textfield__input" type="text" id="location" name="location" placeholder="Type address...">
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

                       

                    </div>
                </div>

            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Maps JavaScript library -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAA5iKqhOQe2_WiVbY7Z-uCKcJlFYbga3c&region=IL&language=Hebr"></script>
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

    // Google Maps API 

    var searchInput = 'location';
    $(document).ready(function () {
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
            types: ['geocode'],
        })

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var near_place = autocomplete.getPlace();
        });
    });


    </script>
