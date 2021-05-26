        <!-- This page will show an outgoing swap request and let the user see its details
        (status, selected book for swap..),
        contact info if approved or cancel the request. -->

        <!-- Variables from controller:

        flag = swap flag checks if a book was selected by the requested user or not
        other_user = The other user's information (the requested user)
        book2 = All of the data on the received book (if selected) 
        book_info = All the data on the desired book
        book_info2 = Swap info and the desired book info 

         -->


        <main class="mdl-layout__content text-center">
            <div class="mdl-grid portfolio-max-width">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset"> <!-- centered div -->
                <?php foreach ($book_info2 as $bi): ?>
                    <span>
                    <!-- If the swap is completed: -->
                        <span class="<?php if ($bi->swap_status != "Completed"){echo "hidden";}?>">
                            <!-- If the status is completed, show contact phone! -->
                            <h3>You completed a swap!</h3>
                                        <h5>You may now reach each other and work out the details!</h5>
                                        <?php foreach ($other_user as $ou): ?>
                                        <a href="https://api.whatsapp.com/send?phone=+972<?php echo $ou->phone_num?>&text=Hi!%20It%27s%20me%20from%20Bambook.%20Lets%20finish%20our%20book%20swap!" target="_blank">
                                        <img style="height:50px; width:50px;" class="card-img-top" alt="Contact" src='<?php echo base_url('images/whatsapp.png');?>' >
                                        </a>
                                        <?php endforeach ?>
                            <!-- End if status is completed -->
                        </span>
                    <!-- if the swap was cancelled: -->
                        <span class="<?php if ($bi->swap_status != "Cancelled"){echo "hidden";}?>">
                            <h3>Sorry, This swap request was cancelled.</h3>            
                        </span>

                    <!-- If the swap was not completed or not cancelled: -->
                        <span>
                            <?php if($bi->swap_status != "Completed" && $bi->swap_status != "Cancelled"){echo ("<h3>You sent a swap request!</h3>");}?>
                        </span>
                            
                
                    <?php $flagg = $flag[0]->received_book; if (isset($flagg)){$flagg=true;}?>

                    <h6>Status: <?php echo $bi->swap_status?>
                    <br>
                        Sent on: <?php echo $bi->start_time?>
                    <br>
                    </h6>
                </span>
                    
                    <!-- Requested book -->
                    <div class="card" style="width: 25rem">
                        <!-- book image -->
                        <h4>The book you want:</h4>
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
                            <!-- Book Genre -->
                            <li class="list-group-item">Genre: <?php echo $bi->book_genre ?></li><!-- to add these details from the DB -->
                            <!-- Book Language -->
                            <li class="list-group-item">Language: <?php echo $bi->lang?></li>
                            <!-- Book Condition -->
                            <li class="list-group-item">Condition: <?php echo $bi->cond ?></li>
                        </ul>

                        <div style="clear: both;"></div>
                    </div>

                    <!-- If a book is not picked, write this: -->

                        <center><br><h4 class="<?php if ($flagg !=null){echo 'hidden';} ?>" id="brw">Looks like <?php echo $bi->sent_to_username?> hasn't selected a book yet. Once selected, it will show here.</h4></center>
                 
                    
                     <!-- If a book is picked, write this: -->
                   
                        <center><br><h4 class = " <?php if ($flagg==null){echo 'hidden';}?> "><?php echo $bi->sent_to_username?> has selected the following book:</h4><br></center>
                  

                    <!-- Book 2 = the book you will get -->
                    <div class="card" style="width: 25rem">
                        <!-- book image -->
                      
                            <span id="img1" class="card-img-top <?php if ($flagg !=null){echo "hidden";} ?>"> <img style="width:50%" class="card-img-top" alt="Mystery Book" src='<?php echo base_url('images/books_images/mystery_book.png');?>'> </span>
                            <?php foreach ($book2 as $b2): ?>
                            <!--  OLD IMAGE: <span id="img2" class="card-img-top <?php if ($flagg ==null){echo 'hidden';} ?>"><?php echo '<img style="width:50%" class="card-img-top" alt="Book Image"src="data:image/jpeg;base64,'.base64_encode( $b2->img).'"/>';?> </span> -->
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
                        <div class="card-body <?php if ($bi->swap_status == "Completed" || $bi->swap_status == "Cancelled") echo 'hidden'?>" >
                            <!-- Cancel button for canceling the request -->
                            <?php echo form_open('Books/cancel_swap_out'); ?>
                            <!-- send the swap ID -->
                                <input type="hidden" value="<?php echo $bi->swap_UID;?>" name="cancel_swap1" id="cancel_swap1">
                            <!-- Hidden button to submit the form -->
                                <button class="mdl-button mdl-js-button mdl-button--raised" type="button" name="cancel" id="cancel">Cancel Swap</button>
                                <button class="hidden mdl-button mdl-js-button mdl-button--raised" type="submit" name="cancel1" id="cancel1">Cancel Swap</button>   
                            <?php echo form_close(); ?>
                            <br>
                            <a href="javascript:history.back()" class="card-link alignleft">Go Back</a>
                        </div>
                        <div style="clear: both;"></div>
                    </div> 
                </div>
            </div>
            <?php 
            endforeach
            ?>

    <script src="https://code.getmdl.io/1.3.0/material.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    <script>
        document.getElementById("cancel").onclick=function()
        {
            var t = confirm("Are you sure you want to cancel this swap?");
            if (t==true){
                document.getElementById("cancel1").click();
                };
            };

    </script>