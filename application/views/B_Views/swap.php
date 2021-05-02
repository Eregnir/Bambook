        <!-- This page will show an incoming swap request and let the user select a book he desires, and approve or cancel the request. -->
        <main class="mdl-layout__content text-center">
            <div class="mdl-grid portfolio-max-width">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset"> <!-- centered div -->
                <span>
                <?php foreach ($book_info as $bi):?>
                <h3>You have a swap request!</h3>
                <h6>Status: <?php echo $bi->swap_status?>
                <br>
                    Sent on: <?php echo $bi->start_time?>
                <br>
                </h6>
                </span>
                    
                    <!-- Requested book -->
                    <div class="card" style="width: 25rem">
                        <!-- book image -->
                        <h4><?php echo $bi->sent_by_username?> wants:</h4>
                        <span class="card-img-top"><?php echo '<img style="width:50%" class="card-img-top" alt="Book Image"src="data:image/jpeg;base64,'.base64_encode( $bi->img).'"/>';?></span>
                        <div class="card-body">
                            <!-- book title -->
                            <h3 class="card-title"><?php echo $bi->title ?></h3> 
                            <!--Book Author-->
                            <h5 class="card-title"><?php echo $bi->author ?></h5> 
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Genre: Fiction</li><!-- to add these details from the DB -->
                            <!-- Book Language -->
                            <li class="list-group-item">Language: <?php echo $bi->lang?></li>
                            <!-- Book Condition -->
                            <li class="list-group-item">Condition: <?php echo $bi->cond ?></li>
                        </ul>

                        <div style="clear: both;"></div>
                    </div>
                    <center><br><h4>Browse <?php echo $bi->sent_by_username?>'s books to select one:"</h4><br></center>
                    <!-- Book 2 = the book you will get -->
                    <div class="card" style="width: 25rem">
                        <!-- book image -->
                        <span id="img1" class="card-img-top"> <img style="width:50%" class="card-img-top" alt="Add Book" src='<?php echo base_url('images/add-book.png');?>'> </span>
                        <span id="img2" class="hidden card-img-top"><?php echo '<img style="width:50%" class="card-img-top" alt="Book Image"src="data:image/jpeg;base64,'.base64_encode( $bi->img).'"/>';?></span>
                        <div class="hidden card-body">
                            <!-- book title -->
                            <h3 class="card-title"><?php echo $bi->title ?></h3> 
                            <!--Book Author-->
                            <h5 class="card-title"><?php echo $bi->author ?></h5> 
                        </div>
                        <ul class="hidden list-group list-group-flush">
                            <li class="list-group-item">Genre: Fiction</li><!-- to add these details from the DB -->
                            <!-- Book Language -->
                            <li class="list-group-item">Language: <?php echo $bi->lang?></li>
                            <!-- Book Condition -->
                            <li class="list-group-item">Condition: <?php echo $bi->cond ?></li>
                        </ul>
                        <div class="card-body">
                            <!-- Approve or cancel swap -->
                            <?php echo form_open('#'); ?>
                            <!-- send the book's UID -->
                                <input type="hidden" value="<?php echo $bi->UID;?>" name="UID" id="UID">
                            <!-- send the owner's username  -->
                                <input type="hidden" value="<?php // echo $bi->user_username;?>" name="sent_to_username" id="sent_to_username"> 
                            <!-- send the requesters username -->
                                <input type="hidden" value="<?php // echo $user['username'];?>" name="sent_by_username" id="sent_by_username"> 
                            <!-- Hidden button to submit the form -->
                                <button class="hidden mdl-button mdl-js-button mdl-button--icon" type="submit" name="submit" id="submit">Submit</button>   
                                <!-- Displayed button to start the 'are you sure' message -->
                                <button id="swap" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent card-link alignright" type="button" name="swap">
                                    Approve Swap
                                </button>
                            <?php echo form_close(); ?>

                            <!-- Cancel button for canceling the request -->
                            <?php echo form_open('#'); ?>
                            <!-- send the swap ID -->
                                <input type="hidden" value="<?php echo $bi->UID;?>" name="UID" id="UID">
                            <!-- Hidden button to submit the form -->
                                <button class="mdl-button mdl-js-button mdl-button--raised" type="submit" name="cancel" id="cancel">Cancel Swap</button>   
                            <?php echo form_close(); ?>
                            <br>
                            <a href="javascript:history.back()" class="card-link alignleft">Go Back</a>
                        </div>
                        <div style="clear: both;"></div>
                    </div> 
                </div>
            </div>
            <?php endforeach; ?>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    <script>
        document.getElementById("swap").onclick=function()
    {
        var x = confirm("Approving the request will swap the books here on Bambook, and will share your contact info to each other for making the swap. Continue?");
        if (x==true){
            document.getElementById("submit").click();
            };
        };


    </script>