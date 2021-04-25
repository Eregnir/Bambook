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
                        <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">Personal Details</h3>
                        <div class="mdl-cell mdl-cell--8-col mdl-card__supporting-text no-padding ">
                            <p>
                                
                                User Name: <span> <?php foreach ($profile as $prof){echo $prof->username;}?> </span>
                                <br>Name: <?php foreach ($profile as $prof){echo $prof->f_name. $prof->l_name;}?>
                                <br>Email: <?php foreach ($profile as $prof){echo $prof->email;}?>
                                <br>Phone Number: <?php foreach ($profile as $prof){echo $prof->phone_num;}?>
                                <br>Favorite Genres: 
                                <br>Location: <?php foreach ($profile as $prof){echo $prof->location;}?>
                            </p>
                        </div>




                        <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">Irure mollit est sit labore</h3>

                        <div class="mdl-cell mdl-cell--8-col mdl-card__supporting-text no-padding ">
                            <p>
                                Excepteur reprehenderit sint exercitation ipsum consequat qui sit id velit elit. Velit anim eiusmod labore sit amet. Voluptate voluptate irure occaecat deserunt incididunt esse in. Sunt velit aliquip sunt elit ex nulla reprehenderit qui ut eiusmod ipsum do. Duis veniam reprehenderit laborum occaecat id proident nulla veniam. Duis enim deserunt voluptate aute veniam sint pariatur exercitation. Irure mollit est sit labore est deserunt pariatur duis aute laboris cupidatat. Consectetur consequat esse est sit veniam adipisicing ipsum enim irure.
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

