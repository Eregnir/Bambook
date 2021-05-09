        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset"> <!-- centered div -->
                    <?php foreach ($book_info as $bi):?>

                    <div class="card" style="width: 25rem">
                    <!-- book image -->
                        <span class="card-img-top"><?php echo '<img class="card-img-top" alt="Book Image"src="data:image/jpeg;base64,'.base64_encode( $bi->img).'"/>';?></span>
                        <div class="card-body">
                            <!-- book title -->
                            <h2 class="card-title"><?php echo $bi->title ?></h2> 
                            <!--Book Author-->
                            <h4 class="card-title"><?php echo $bi->author ?></h4> 
                            <!-- Book description -->
                            <p class="card-text">
                                "My name was Salmon, like the fish; first name, Susie. I was fourteen when I was murdered on December 6, 1973."
                                So begins the story of Susie Salmon, who is adjusting to her new home in heaven, a place that is not at all what she expected,
                                even as she is watching life on earth continue without her -- her friends trading rumors about her disappearance,
                                her killer trying to cover his tracks, her grief-stricken family unraveling. Out of unspeakable tragedy and loss,
                                The Lovely Bones succeeds, miraculously, in building a tale filled with hope, humor, suspense, even joy.
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Genre: Fiction</li><!-- to add these details from the DB -->
                            <!-- Book Language -->
                            <li class="list-group-item">Language: <?php echo $bi->lang?></li>
                            <!-- Book Condition -->
                            <li class="list-group-item">Condition: <?php echo $bi->cond ?></li>
                        </ul>
                        
                        <!-- Form to change the availability  -->
                        <div class="card-body">
                            <a href="javascript:history.back()" class="card-link alignleft">Go Back</a>
                            <!-- 
                                This is what I need when sending this form:
                                    1. create the correct form in the controller
                                    2. send to here from my library
                             -->
                            <?php echo form_open('Books/single_book'); ?>
                            <!-- send the book's UID -->
                                <input type="hidden" value="<?php echo $bi->UID;?>" name="UID" id="UID">
                            <!-- send the owner's username  -->
                                <input type="hidden" value="<?php echo $bi->user_username;?>" name="sent_to_username" id="sent_to_username"> 
                            <!-- send the requesters username -->
                                <input type="hidden" value="<?php echo $user['username'];?>" name="sent_by_username" id="sent_by_username"> 
                            <!-- Hidden button to submit the form -->
                                <button class="hidden mdl-button mdl-js-button mdl-button--icon" type="submit" name="submit" id="submit">Submit</button>   
                                <!-- Displayed button to start the 'are you sure' message -->
                                <button id="swap" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent card-link alignright" type="button" name="swap">
                                    Request Swap
                                </button>
                            <?php echo form_close(); ?>
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
        var x = confirm("Sending a request will notify this book's owner and will allow browsing your available books, in order to complete the swap process. Continue?");
        if (x==true){
            document.getElementById("submit").click();
            };
        };


    </script>