        <!-- This page will show an incoming swap request and let the user select a book he desires, and approve or cancel the request. -->
        <main class="mdl-layout__content text-center">
            <div class="mdl-grid portfolio-max-width">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset"> <!-- centered div -->
                <?php foreach ($book_info as $bi):?>
                <span>
                    <span class="<?php if($bi->swap_status == "Completed"){echo "hidden";} ?> ">
                        <h3>You have a swap request!</h3>
                    </span>

                <!-- If the status is completed, show contact phone! -->
                    <span class='<?php if($bi->swap_status != "Completed"){echo "hidden";} ?> '> 
                        <h3>You completed a swap!</h3>
                        <h5>You may now reach each other and work out the details!</h5>
                        <?php foreach ($other_user as $ou): ?>
                        <a href="https://api.whatsapp.com/send?phone=+972<?php echo $ou->phone_num?>&text=Hi!%20It%27s%20me%20from%20Bambook.%20Lets%20finish%20our%20book%20swap!" target="_blank">
                        <img style="height:50px; width:50px;" class="card-img-top" alt="Contact" src='<?php echo base_url('images/whatsapp.png');?>' >
                        </a>
                        <?php endforeach ?>
                    </span>
                    <?php 
                    $flagg = $flag[0]->received_book;
                    if (isset($flagg)){$flagg=true;}
                    ?>

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
                        <!-- old image: <span class="card-img-top"><?php echo '<img style="width:50%" class="card-img-top" alt="Book Image"src="data:image/jpeg;base64,'.base64_encode( $bi->img).'"/>';?></span> -->
                        <span class="card-img-top"> <img src="<?php echo base_url('images/user_uploads/'.$bi->img_title);?>" class="card-img-top" alt="Book Photo" style="width:50%"> <br></span>

                        <div class="card-body">
                            <!-- book title -->
                            <h3 class="card-title"><?php echo $bi->title ?></h3> 
                            <!--Book Author-->
                            <h5 class="card-title"><?php echo $bi->author ?></h5> 
                        </div>
                        <ul class="list-group list-group-flush">
                            <!-- Book's owner -->
                            <li class="list-group-item">Owner: <?php echo $bi->user_username ?></li><!-- to add these details from the DB -->
                            <!-- Book genre -->
                            <li class="list-group-item">Genre: <?php echo $bi->book_genre ?></li><!-- to add these details from the DB -->
                            <!-- Book Language -->
                            <li class="list-group-item">Language: <?php echo $bi->lang?></li>
                            <!-- Book Condition -->
                            <li class="list-group-item">Condition: <?php echo $bi->cond ?></li>
                        </ul>

                        <div style="clear: both;"></div>
                    </div>
                    <!-- If a book is not picked, write this: -->

                        <center><br><h4 class="<?php if ($flagg !=null){echo 'hidden';} ?>" id="brw">Browse <?php echo $bi->sent_by_username?>'s books and choose one you'd like for the swap:</h4><br></center>
                 
                    
                     <!-- If a book is picked, write this: -->
                   
                        <center><br><h4 class = " <?php if ($flagg==null){echo 'hidden';}?> ">You have selected the following book:</h4><br></center>
                  

                    <!-- Book 2 = the book you will get -->
                    <div class="card" style="width: 25rem">
                        <!-- book image -->
                      
                            <span id="img1" class="card-img-top <?php if ($flagg !=null){echo "hidden";} ?>"> <img style="width:50%" class="card-img-top" alt="Add Book" src='<?php echo base_url('images/add-book.png');?>'> </span>
                            <?php foreach ($book2 as $b2): ?>
                           
                            <!-- OLD IMAGE <span  class="card-img-top "><?php echo '<img style="width:50%" class="card-img-top" alt="Book Image"src="data:image/jpeg;base64,'.base64_encode( $b2->img).'"/>';?> </span> -->
                            
                            <span id="img2" class="card-img-top <?php if ($flagg ==null){echo 'hidden';} ?>"> <img src="<?php echo base_url('images/user_uploads/'.$b2->img_title);?>" class="card-img-top" alt="Book Photo" style="width:50%"> <br></span>

                            <div class="card-body <?php if ($flagg ==null){echo 'hidden';}?> ">
                                <!-- book title -->
                                <h3 class="card-title"><?php echo $b2->title ?></h3> 
                                <!--Book Author-->
                                <h5 class="card-title"><?php echo $b2->author ?></h5> 
                            
                        </div>
                            <ul class="list-group list-group-flush <?php if ($flagg==null){echo 'hidden';}?>">
                                <!-- Book's owner -->
                                <li class="list-group-item">Owner: <?php echo $b2->user_username ?></li><!-- to add these details from the DB -->
                                <!-- Book Genre -->
                                <li class="list-group-item">Genre: <?php echo $b2->book_genre ?></li><!-- to add these details from the DB -->
                                <!-- Book Language -->
                                <li class="list-group-item">Language: <?php echo $b2->lang?></li>
                                <!-- Book Condition -->
                                <li class="list-group-item">Condition: <?php echo $b2->cond ?></li>
                                <?php endforeach ?>
                            </ul>
                        <div class="card-body">
                      
                        

                        <!-- Form to open the other user's list of books, to allow selection of a book for the swap: -->
                        <?php echo form_open('Books/browse_books_for_swap'); ?>
                            <!-- send the other user's username:-->
                                <input type="hidden" value="<?php echo $bi->sent_by_username;?>" name="sent_by" id="sent_by">
                            <!-- send the swap_UID:-->
                            <input type="hidden" value="<?php echo $bi->swap_UID;?>" name="swap_UID" id="swap_UID">   
                            <!-- Hidden button to submit the form -->
                                <button class="hidden mdl-button mdl-js-button mdl-button--raised" type="submit" name="browse" id="browse">Browse</button>   
                            <?php echo form_close(); ?>

                        <span class="<?php if ($bi->swap_status == "Completed" || $bi->swap_status == "Cancelled") echo 'hidden'?> ">
                            
                                <!-- Approve or cancel swap -->
                                <?php echo form_open('Books/approve_swap'); ?>
                                <!-- send the swap ID -->
                                <input type="hidden" value="<?php echo $bi->swap_UID;?>" name="swp_UID" id="swp_UID">
                                <!-- send the book1's UID -->
                                    <input type="hidden" value="<?php echo $bi->UID;?>" name="b1_UID" id="b1_UID">
                                <!-- send the book2's UID  -->
                                <?php foreach ($book2 as $b2): ?>
                                    <input type="hidden" value="<?php echo $b2->UID;?>" name="b2_UID" id="b2_UID"> 
                                <?php endforeach ?>
                                
                                <!-- Hidden button to submit the form -->
                                    <button class="hidden mdl-button mdl-js-button mdl-button--icon" type="submit" name="approve_btn" id="approve_btn">Submit</button>   
                                    <!-- Displayed button to start the 'are you sure' message -->
                                    <button id="apr" class="<?php if ($flagg==null){echo 'hidden';}?> mdl-button mdl-js-button mdl-button--raised mdl-button--accent card-link alignright" type="button" name="apr">
                                        Approve Swap
                                    </button>
                                <?php echo form_close(); ?>
    
                                <!-- Cancel button for canceling the request -->
                                <?php echo form_open('Books/cancel_swap_in'); ?>
                                <!-- send the swap ID -->
                                    <input type="hidden" value="<?php echo $bi->swap_UID;?>" name="cancel_swap1" id="cancel_swap1">
                                <!-- Hidden button to submit the form -->
                                    <button class="mdl-button mdl-js-button mdl-button--raised" type="button" name="cancel" id="cancel">Cancel Swap</button>
                                    <button class="hidden mdl-button mdl-js-button mdl-button--raised" type="submit" name="cancel1" id="cancel1">Cancel Swap</button>   
                                <?php echo form_close(); ?>
                        </span>
                            <br>
                            <a href="javascript:history.back()" class="card-link alignleft">Go Back</a>
                        </div>
                        <div style="clear: both;"></div>
                    </div> 
                </div>
            </div>
            <?php endforeach; ?>

    <script src="https://code.getmdl.io/1.3.0/material.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    <script>
        document.getElementById("apr").onclick=function()
        {
            var x = confirm("Approving the request will swap the books here on Bambook, and will share your contact info to each other for making the swap. Continue?");
            if (x==true){
                document.getElementById("approve_btn").click();
                };
            };

        document.getElementById("cancel").onclick=function()
        {
            var t = confirm("Are you sure you want to cancel this swap?");
            if (t==true){
                document.getElementById("cancel1").click();
                };
            };

        document.getElementById("img1").onclick=function()
        {
            var status = '<?php echo $bi->swap_status?>';
            if (status != 'Cancelled' && status != 'Completed'){
                document.getElementById("browse").click();
            }
            };
        
        document.getElementById("img2").onclick=function()
        {
            var status = '<?php echo $bi->swap_status?>';
            if (status != 'Cancelled' && status != 'Completed'){
                document.getElementById("browse").click();
            }
            };

    </script>