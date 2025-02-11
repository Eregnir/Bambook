        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">

                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                   
                    <div class="mdl-grid portfolio-copy">
                        <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline text-center"><u>Select Avatar:</u></h3>

                        
                            <?php foreach ($avatars as $avatar):
                            //Open a form that will send the avatar UID to the controller in order to select it and change the avatar.
                                    $attributes = array('id' => $avatar->avatar_UID);?>
                                    <div style = "margin:auto;">
                                    <?php echo form_open('Users/update_avatar', $attributes); ?>
                                    <input type="hidden" value="<?php echo $avatar->avatar_UID;?>" name="avatar_UID" id="<?php echo 'avatar_'.$avatar->avatar_UID?>"> 
                                    <center><div id="<?php echo $avatar->avatar_UID?>" class="mdl-cell mdl-cell--8-col mdl-card__supporting-text no-padding">
                                    <?php echo '<img style="max-height:150px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $avatar->img).'"/>'; ?>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="submit" name="submit ">
                                            Select
                                        </button>
                                </div> </center>
                                <hr style="width:90%;">
                                <?php echo form_close(); ?>
      
                            <?php endforeach; ?>
                        </div>

                    </div>
            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
