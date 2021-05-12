        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset"> <!-- centered div -->
                    <?php foreach ($book_info as $bi):?>

                    <div class="card" style="width: 25rem">
                    <!-- book image -->
                        <span class="card-img-top"> <img src="<?php echo base_url('images/user_uploads/'.$bi->img_title);?>" class="card-img-top" alt="Book Photo"> <br></span>

                        <div class="card-body">
                            <!-- book title -->
                            <h2 class="card-title"><?php echo $bi->title ?></h2> 
                            <!--Book Author-->
                            <h4 class="card-title"><?php echo $bi->author ?></h4> 
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Genre: Fiction</li><!-- to add these details from the DB -->
                            <!-- Book Language -->
                            <li class="list-group-item">Language: <?php echo $bi->lang?></li>
                            <!-- Book Condition -->
                            <li class="list-group-item">Condition: <?php echo $bi->cond ?></li>
                            <!-- Book availability -->
                            <li class="list-group-item">Available for swap: <?php if ($bi->availability == 1){echo 'Yes' ;} else{echo 'No';}?> 
                            <span id="tooltip4" class="material-icons-outlined"> info </span>
                        </li>
                        </ul>
                        <!-- Add tooltip -->
                            <div class = "mdl-tooltip" for = "tooltip4">
                            Available books are publicly visible.<br>Use them for future swaps!</div>
                        <!-- Form to change the availability  -->
                        <div class="card-body">
                            <a href="javascript:history.back()" class="card-link alignleft">Go Back</a>
                            <!-- 
                                This is what I need when sending this form:
                                    1. create the correct form in the controller
                                    2. send to here from my library
                             -->
                            <?php echo form_open('Books/set_availability'); ?>
                            <!-- send the book's UID -->
                                <input type="hidden" value="<?php echo $bi->UID;?>" name="UID" id="UID">
                            <!-- send the book's current availability -->
                            <input type="hidden" value="<?php echo $bi->availability;?>" name="avail" id="avail">
                            <!-- Hidden button to submit the form -->
                                <button class="hidden mdl-button mdl-js-button mdl-button--icon" type="submit" name="submit" id="submit">Submit</button>   
                                <!-- Displayed button to start the 'are you sure' message -->
                                <button id="swap" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent card-link alignright" type="button" name="swap">
                                    Change Availability
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
        var x = confirm("Are you sure you want to change this book's availability?");
        if (x==true){
            document.getElementById("submit").click();
            };
        };


    </script>