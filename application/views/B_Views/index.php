        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <!-- Box 1--> 
                <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                    <div class="mdl-card__media">
                        <a href="portfolio-example01.html">
                            <img class="article-image" src="<?php echo base_url('images/example-work01.jpg');?>" border="0" alt="">
                        </a>
                    </div>
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Available Books</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <!-- Text here if needed -->
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="portfolio-example01.html">Read more</a>
                    </div>
                </div>
                <!-- End Box 1--> 
                <!-- Box 2 -->
                <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                    <div class="mdl-card__media">
                        <a href="portfolio-example02.html">
                            <img class="article-image" src="<?php echo base_url('images/available_books.jpg');?>" border="0" alt="available_books">
                        </a>
                    </div>
                    <div class="mdl-card__title">
                    <!-- Box  2--> 
                        <h2 class="mdl-card__title-text">My Requests</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                         <!-- Text here if needed -->
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="portfolio-example01.html">Read more</a>
                    </div>
                </div>
                <!-- End box 2 -->
                 <!-- Box 3--> 
                <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                    <div class="mdl-card__media">
                        <a href="portfolio-example03.html">
                            <img class="article-image" src="<?php echo base_url('images/my_requests.jpg');?>" border="0" alt="my_requests">
                        </a>
                    </div>
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Add books</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                         <!-- Text here if needed -->
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="portfolio-example01.html">Read more</a>
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
    </script>