        <main class="mdl-layout__content">
        <br>
            <div class="mdl-grid portfolio-max-width">
                <span class="text-center" style="margin:auto; display:block;">
                <!-- Welcome, User: -->
                <h4>
                <?php
                if (isset($new)){
                    echo 'Hi there '.$user['username'].'! Your registration was completed successfully. <br> We hope you enjoy Bambook! <br> <h6>Do not forget to complete your preferences in the Profile tab.</h6>';
                    foreach ($profile as $prof){echo '<center><img style="max-height:80px; max-width: 100%; margin:auto; display:block;" src="data:image/jpeg;base64,'.base64_encode( $prof->img).'"/>';};    
                }
                elseif ($user['username']!=null){
                    echo 'Welcome, '.$user['username'].'!'.'<br>';?></h4>
                    <?php foreach ($profile as $prof){echo '<center><img id="prfl" onclick="gtprofile()" style="cursor:pointer; max-height:80px; max-width: 100%; margin:auto; display:block;" src="data:image/jpeg;base64,'.base64_encode( $prof->img).'"/>';};?>      
                <?php
                }
                ?>
                </span>
            </div>
            <div class="mdl-grid portfolio-max-width">
                <!-- Box 1--> 
                <br>
                <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                    <div class="mdl-card__media">
                        <a href="<?php echo site_url('Intro/my_library');?>">
                            <img class="article-image" src="<?php echo base_url('images/available_books.jpg');?>" border="0" alt="">
                        </a>
                    </div>
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">My Library</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        Your library contains all the books that you have listed on Bambook!<br>
                        The library also includes books you swapped.
                        <!-- Text here if needed -->
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-button--accent" href="<?php echo site_url('Intro/my_library');?>">Browse my library</a>
                    </div>
                </div>
                <!-- End Box 1--> 
                <!-- Box 2 -->
                <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                    <div class="mdl-card__media">
                        <a href="<?php echo site_url('Intro/my_requests');?>">
                            <img class="article-image" src="<?php echo base_url('images/my_requests.jpg');?>" border="0" alt="available_books">
                        </a>
                    </div>
                    <div class="mdl-card__title">
                    <!-- Box  2--> 
                        <h2 class="mdl-card__title-text">My Swaps</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        You have <h3 style="display:inline;"> <div class="material-icons mdl-badge mdl-badge--overlap" data-badge="<?php echo count($swap_count);?>">menu_book</div></h3> active requests!<br>
                        <br>Here you can find all of your message requests and communicate with other users.
                         <!-- Text here if needed -->
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-button--accent" href="<?php echo site_url('Intro/my_requests');?>">Browse my requests</a>
                    </div>
                </div>
                <!-- End box 2 -->
                 <!-- Box 3--> 
                <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                    <div class="mdl-card__media">
                        <a href="<?php echo site_url('Intro/publish_book');?>">
                            <img class="article-image" src="<?php echo base_url('images/add_books.jpg');?>" border="0" alt="my_requests">
                        </a>
                    </div>
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">List a book</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        Finished reading a book? Your old books are getting dusty?<br>
                        List a book you want to offer for a swap and let others enjoy it.
                         <!-- Text here if needed -->
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-button--accent" href="<?php echo site_url('Intro/publish_book');?>">List a book</a>
                    </div>
                </div>
                <!-- End box 3 -->
            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    <script>
    window.onload = function(){
        var active = document.getElementById("ind");
        active.classList.add("is-active");
        }
    

    function gtprofile(){
        window.location.href="<?php echo site_url('Intro/about');?>";
    }
    </script>