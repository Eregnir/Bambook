    <!--Cart Intro-->
    <div class="container container2_2">
        <center>
            <h1>Welcome to APE Gaming
            
                <span style="color:purple;">
                    <?php 
                        $user=$this->session->all_userdata();
                        if ($user['loggedin']!=null){
                            echo $user['username'];
                    } 
                    ?>
                </span>
            </h1>
            <img src ="<?php echo base_url('assets/Images/bg-logo.png');?>" style="width: 40%;"><br>
            <h3>Consoles or PC -  APE Gaming is here to serve. <br>Join our community and find game reviews, podcasts, and the latest games available for purchase!</h3>
        </center>            
    </div>

    <div class = "row">

        <div class="container container2 container4 container7 col-lg-3">
            <center>
                <div class = "game">
                    <h2>Our Game Gallery</h2>
                    <img alt="XBOX" src="<?php echo base_url('assets/Images/GG.jpeg');?>" style="max-width: 100%; border-radius: 20px; display: block;">
                    <br><button onclick="moveto()" type="button" id="gg" class="btn btn-info" style="margin-bottom: 15px; font-size: 20pt; width:70%;">View All Games</button>                    <br>
                </div>
            </center>
        </div>
        <div class="container container2 container4 container7 col-lg-3">
        
            <center>
            <form>
            <br>
                <h2>Why so serious?</h2>
                <h4>Lets put a smile on that face! with a joke :D</h4>
                <p>Type in a category:<br>animal, music, celebrity, dev, food, money, science</p>
                <div>
                        <p><input  id="category" type="text"></p>
                        <p><input  type="button" value="Give me a joke!" onclick="find()"></p>
                </div>

            </form>
            <br><br>
           <h4>
                <div id="error"></div>
                <div id="info"></div>
           </h4>
            </center>
        </div>

        
    </div>

    <script>
    function moveto(){
        window.location.href="<?php echo site_url('Games/get_games');?>";
    }

    </script>

    <script>    
    function find(){
            var category = $("#category").val();
            $.ajax({
            url: "<?php echo site_url(); ?>" + "/Games/joke",
            type: 'GET',
            data: {category: category},
            error: function() {
                alert('Something is wrong');
            },
            success: function(data) {
                var obj =JSON.parse(data);
    
                if(obj.code==="0"){
                    $("#error").html("I said type in a category! try to copy it from the list above.");
                    $("#info").html("");
                    
                    }
                    else{
                        var str=obj.description;
                        $("#info").html(str);
                    $("#error").html("");
                }
                }
            });
    }
    </script>

</body>

</html>
