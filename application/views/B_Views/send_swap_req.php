        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset"> 
                    <!-- centered div -->

                    <?php foreach ($book_info as $bi):?>

                    <div class="card" style="width: 25rem">
                    <p>
                        <h4>Interested in this book?</h4><br>
                        Great! by tapping "send request", this book's owner will be notified and be able to view and choose a book from your available books.<br>
                        
                    </p>
                    <!-- book image -->
                        <p class="card-img-top"><?php echo '<img class="card-img-top" alt="Book Image"src="data:image/jpeg;base64,'.base64_encode( $bi->img).'"/>';?></p>
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
                        <div class="card-body">
                            <a href="javascript:history.back()" class="card-link alignleft">Go Back</a>
                            <button id="swap" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent card-link alignright" type="button">
                                Request Swap
                            </button>
                            <!-- <a href="#" class="card-link alignright">Request Swap</a> -->
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
        window.location.href="<?php echo site_url('Books/new_swap');?>";   
    };
    </script>