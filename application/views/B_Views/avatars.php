        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">

                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                   
                    <div class="mdl-grid portfolio-copy">
                        <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline"><u>Select Avatar:</u></h3>
                        <!-- Show all avatars: -->
                        <?php foreach ($avatars as $avatar): ?> <br>
                        <div class="mdl-cell mdl-cell--8-col mdl-card__supporting-text no-padding ">
                            <?php echo '<center><img style="max-height:200px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $avatar->img).'"/></center>'; ?>
                        </div>
                        <hr style="width:95%;">
                        <?php endforeach; ?>                        
                </div>

            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script>

    </script>

