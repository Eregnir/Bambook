        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset"> <!-- centered div -->
                    <?php
                        echo $b_UID;
                        foreach ($book_info as $bi):?>

                    <div class="card" style="width: 25rem">
                        <span class="card-img-top"><?php echo '<img style="max-height:200px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $bi->img).'"/>';?></span>
                        <div class="card-body">
                            <h2 class="card-title">The Lovely Bones
                                    ; ?> </h2> <!--Book title-->
                            <h4 class="card-title">Alice Sebold</h4> <!--Book Author-->
                            <h5 class="card-text">3.82</h5> <!--Rating-->
                            <p class="card-text"><!-- Book description -->
                                "My name was Salmon, like the fish; first name, Susie. I was fourteen when I was murdered on December 6, 1973."
                                So begins the story of Susie Salmon, who is adjusting to her new home in heaven, a place that is not at all what she expected,
                                even as she is watching life on earth continue without her -- her friends trading rumors about her disappearance,
                                her killer trying to cover his tracks, her grief-stricken family unraveling. Out of unspeakable tragedy and loss,
                                The Lovely Bones succeeds, miraculously, in building a tale filled with hope, humor, suspense, even joy.
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Genre: Fiction</li><!-- to add these details from the DB -->
                            <li class="list-group-item">Language: English</li>
                            <li class="list-group-item">Condition: Like new</li>
                        </ul>
                        <div class="card-body">
                            <a href="javascript:history.back()" class="card-link alignleft">Go Back</a>
                            <button onclick="location.href='#'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent card-link alignright" type="button">
                                Request Swap
                            </button>
                            <!-- <a href="#" class="card-link alignright">Request Swap</a> -->
                        </div>
                        <div style="clear: both;"></div>
                    </div> 
                </div>
            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    <script>
    window.onload = function(){
        var active = document.getElementById("ind");
        active.classList.add("is-active");
        }
    </script>