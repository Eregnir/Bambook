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
                                <!--       -->
                                    <b>Favorite Genres:</b> 
                                    <?php foreach ($profile as $prof){
                                        if($prof->genre1=='1'){echo 'Fantasy | '; $g1 = true;}
                                        if($prof->genre2=='1'){echo 'Mystery | ' ;$g2 = true;}
                                        if($prof->genre3=='1'){echo 'Romance | ';$g3 = true;}
                                        if($prof->genre4=='1'){echo 'Thriller | ';$g4 = true;}
                                        if($prof->genre5=='1'){echo 'Biography | ';$g5 = true;}
                                        if($prof->genre6=='1'){echo 'Inspirational | ';$g6 = true;}
                                        if($prof->genre7=='1'){echo 'Other'; $g7 = true;}
                                        }?>
                                    
                                    <br><br><b>Region:</b> <?php foreach ($profile as $prof){echo $prof->user_region; $reg=$prof->user_region;}?>
                                </h5>
                            </p>
                            <button id="ep" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Edit Preferences</button>
                        </div>

                        <div style="display:none;" id="bspe" class="mdl-cell mdl-cell--8-col mdl-card__supporting-text no-padding ">
                        
                            <!-- Edit info Form -->

                            <form method="post" action="<?php echo site_url('Users/update_pref');?>" class="">
                                <div>
                                    <h5><b>Favorite Genres:</b></h5>
                                </div>
                            <!-- Favorite Genre 1 -->
                                <div>
                                    <input value="1" class="mdl-checkbox__input" type="checkbox" id="genre1" name="genre1" <?php if($g1==true){echo 'checked';};?>>
                                    <label class="mdl-checkbox__label" for="genre1">Fantasy</label>
                                </div>
                            <!-- Favorite Genre 2 -->
                                <div>
                                    <input value="1" class="mdl-checkbox__input" type="checkbox" id="genre2" name="genre2" <?php if($g2==true){echo 'checked';};?>>
                                    <label class="mdl-checkbox__label" for="genre2">Mystery</label>
                                </div>
                            <!-- Favorite Genre 3 -->
                                <div>
                                    <input value="1" class="mdl-checkbox__input" type="checkbox" id="genre3" name="genre3" <?php if($g3==true){echo 'checked';};?>>
                                    <label class="mdl-checkbox__label" for="genre3">Romance</label>
                                </div>
                            <!-- Favorite Genre 4 -->
                                <div>
                                    <input value="1" class="mdl-checkbox__input" type="checkbox" id="genre4" name="genre4" <?php if($g4==true){echo 'checked';};?>>
                                    <label class="mdl-checkbox__label" for="genre4">Thriller</label>
                                </div>
                                <!-- Favorite Genre 5 -->
                                <div>
                                    <input value="1" class="mdl-checkbox__input" type="checkbox" id="genre5" name="genre5" <?php if($g5==true){echo 'checked';};?>>
                                    <label class="mdl-checkbox__label" for="genre5">Biography</label>
                                </div>
                                <!-- Favorite Genre 6 -->
                                <div>
                                    <input value="1" class="mdl-checkbox__input" type="checkbox" id="genre6" name="genre6" <?php if($g6==true){echo 'checked';};?>>
                                    <label class="mdl-checkbox__label" for="genre6">Inspirational</label>
                                </div>
                                <!-- Favorite Genre 7 -->
                                <div>
                                    <input value="1" class="mdl-checkbox__input" type="checkbox" id="genre7" name="genre7" <?php if($g7==true){echo 'checked';};?>>
                                    <label class="mdl-checkbox__label" for="genre7">Other</label>
                                </div><br>
                                <!-- User Region -->
                                <div class="form-group" style="display: inline-block; width:30%;">
                                    <label for="user_region" class="bmd-label-floating">My Region</label>
                                    <select class="form-control" name="user_region" id="user_region">
                                        <option value="Central" <?php if ($reg == 'Central'){echo 'selected';}?>>Central</option>
                                        <option value="Tel Aviv" <?php if ($reg == 'Tel Aviv'){echo 'selected';}?>>Tel Aviv</option>
                                        <option value="Jerusalem" <?php if ($reg == 'Jerusalem'){echo 'selected';}?>>Jerusalem</option>
                                        <option value="Shfela" <?php if ($reg == 'Shfela'){echo 'selected';}?>>Shfela</option>
                                        <option value="North" <?php if ($reg == 'North'){echo 'selected';}?>>North</option>
                                        <option value="Haifa" <?php if ($reg == 'Haifa'){echo 'selected';}?>>Haifa</option>
                                        <option value="South" <?php if ($reg == 'South'){echo 'selected';}?>>South</option>
                                        <option value="Beersheba" <?php if ($reg == 'Beersheba'){echo 'selected';}?>>Beersheba</option>
                                        <option value="Eilat" <?php if ($reg == 'Eilat'){echo 'selected';}?>>Eilat</option>
                                    </select>
                                </div>
                            <br>
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
    <script>
    window.onload = function(){
        var active = document.getElementById("abt");
        active.classList.add("is-active");
        }
    
    document.getElementById("ep").onclick=function()
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


    </script>
