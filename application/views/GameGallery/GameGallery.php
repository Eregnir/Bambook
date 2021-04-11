        <div> 
            <!--Game Gallery Intro-->
            <div class="container container2_2">
                <center>
                    <h1>Game Gallery</h1>
                    <h3>Join thousands of gamers around the world with the latest video game titles!</h3>
                    <img src ="<?php echo base_url('assets/Images/playing-together.png');?>" style="width: 70%;">
                </center>
                
            </div>
            <br>
           <div class="container container2">
               <?php $user=$this->session->all_userdata(); ?>

                <?php if ($products!=NULL):?>
                         <?php 
                            foreach ($products as $game): ?>
                        <div class="container6 row" id="single podcast">
                        
                        <div class="btn col-lg-2" style="margin: auto; cursor:alias;">
                            <h3 class="center"><span style="font-family: cursive;"><?php echo $game->title;?> </span></h3>
                            <?php echo '<img style="max-height:350px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $game->image).'"/>';?>
                        </div>

                        <div class="col-lg-6">
                        <div class="input-group-text" style="margin-top:10px; margin-bot: 10px; height: 45px; font-family: cursive; width:30%; background-color: rgb(190, 109, 109); font-size: 20pt;"><b class="center"><?php echo $game->genre; ?></b></div>

                            <h3>Game Description:<br></h3><h5><?php echo $game->description;?></h5>
                            
                        </div>
                        <div class="col-lg-4">
                        <p><b><h4>Price:</h4></b>
                            <div class="input-group-text" style="width:30%; background-color:rgb(178, 167, 230); font-size: 20pt;"><b class="center">$<?php echo $game->price; ?></b></div>
                            </p>
                            
                            <p><b>Compatible Consoles:</b><br>
                            
                            <?php 
                            if ($game->ps=="1"){
                                echo '<img src="https://assafye.mtacloud.co.il/Serverside_Programming/APEGaming/assets/Images/PSG.png" alt="PS" style="display: inline;">';
                            }
                            if ($game->xbox=="1"){
                                echo '<img src="https://assafye.mtacloud.co.il/Serverside_Programming/APEGaming/assets/Images/XBOXG.png" alt="XBOX" style="display: inline;">';
                            }
                            if ($game->pc=="1"){
                                echo '<img src="https://assafye.mtacloud.co.il/Serverside_Programming/APEGaming/assets/Images/PCG.png" alt="PC" style="display: inline;">';
                            }
                            ?></p>
                            <!-- Button to save to cart -->

                            <?php echo form_open('Games/add_to_cart'); ?>     
                            <input type="hidden" value="<?php echo $game->UID;?>" name="gc_UID" id="gc_UID"> 
                            <input type="hidden" value="<?php echo $user['username'];?>" name="c_username" id="c_username">
                            <input onclick="alt()" id="addtocart" class="createForm btn btn-primary" type="submit" name="submit" value="Add to cart">
                            <?php echo form_close(); ?>
                        </div>
                </div>
               
             <?php endforeach;?>
               
             <?php endif; ?>   
            </div>

            </div>
            <br>
            <button onclick="scrollToTop()" style="margin-bottom:1px;" class="center btn btn-outline-light" type="button">Back to top</button>
        </div>
        <script>
            $("#addtocart").click(function(){
                alt();
            })
        </script>
</body>



</html>

