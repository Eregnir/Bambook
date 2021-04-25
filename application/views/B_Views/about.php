        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">

                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Profile</h2>
                    </div>
                    <div class="mdl-card__media">
                        <img class="article-image" src="<?php echo base_url('images/about-header.jpg');?>" border="0" alt="">
                    </div>

                    <div class="mdl-grid portfolio-copy">
                        <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">Your Profile</h3>
                        <div class="mdl-cell mdl-cell--8-col mdl-card__supporting-text no-padding ">
                            <p>
                                <h4>
                                    <br>Hello, <span> <?php foreach ($profile as $prof){echo $prof->username;}?>! </span>
                                    <br><b>Name:</b> <?php foreach ($profile as $prof){echo $prof->f_name." ". $prof->l_name;}?>
                                    <br><b>Email:</b> <?php foreach ($profile as $prof){echo $prof->email;}?>
                                    <br><b>Phone Number:</b> <?php foreach ($profile as $prof){echo $prof->phone_num;}?>
                                </h4>
                                
                            </p>
                        </div>




                        <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">Bambook Preferences:</h3>

                        <div class="mdl-cell mdl-cell--8-col mdl-card__supporting-text no-padding ">
                            <p>
                                Favorite Genres:
                                <br>Location: <?php foreach ($profile as $prof){echo $prof->location;}?>
                            </p>
                        </div>
                    </div>
                </div>


            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script>
    window.onload = function(){
        var active = document.getElementById("abt");
        active.classList.add("is-active");
        }
    </script>

