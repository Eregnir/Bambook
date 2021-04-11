<body>
        <div>
            <!--Cart Intro-->
            <div class="container container2_2">
                <center>
                    <h1>Thank you for shopping with us!</h1>
                    <img src ="<?php echo base_url('assets/Images/makeitrain.gif');?>" style="width: 30%;">
                </center>            
            </div>
            <div class="container container2 container4">
                <h1>Cart</h1><br>
                
                    <!--games in cart-->

                    <?php $total = 0; ?>  
                <div class = "row">
                    <div class ="col-lg-7 row">
                        <?php if ($cart!=NULL):?>
                        <?php foreach ($cart as $game): ?>
                            <?php 
                            if ($game->c_username==$user['username']):
                            ?>
                                        <!-- Load the game image -->
                                        <div class="col-lg-6">
                                        <?php echo '<img style="max-height:250px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $game->image).'"/>';?>
                                        </div>

                                        <!-- Load the game details -->
                                        <div class ="col-lg-6" style="display: block;">
                                          
                                            <h3><?php echo $game->title; ?></h3>
                                            <p>
                                                <div>
                                                    <h4>
                                                        <b>Price:</b> <br>$<?php echo $game->price; ?><br><br>
                                                        <?php $total+=$game->price?>
                                                    </h4>
                                                </div>
                                            </p>
                                        </div>
                                        <hr class ="solid" style = "border-top: 3px solid #bbb; width:90%; ">


                            
                            
                        <?php endif; ?>  
                        <?php endforeach; ?>
                        <?php else:?>
                            <h4 class="center">Your cart is empty,<br>Your cart is sad.<br><br>Go add a game,<br>and it will be glad!</h4>
                        <?php endif; ?>                         
                    </div>
                    <!--Cart Total-->
                    <div class="col-md-5" style="float:right; border-radius: 16px; padding-top: 5%; margin-bottom: 10px;">
                        <center>
                            <h3><b>Total: $
                                <span id = "demo"><?php echo $total ?></b></h3></span> <br><br>
                            <button id="co" style="width:85%;" class="btn btn-primary"><h3>Proceed to checkout</h3></button>
                        </center>
                    </div>
                    <div class ="col-lg-7 row">
                        
                    </div>
                </div>
                
            </div>

        </div>

        <script>
            document.getElementById("co").onclick=function()
            {
                //check if the cart is empty. otherwise, checkout.
                <?php if ($cart!=NULL):?>
                    window.alert("Thank you for shopping with us! your games are on their way.");
                    window.location.href="<?php echo site_url('Games/checkout');?>";
                <?php else:?>
                    window.alert("Your shopping cart is empty! you cannot checkout.");
                <?php endif ?>
            };

        </script>
</body>