</head>
 <body>

<main id="mainWrraper">

<div style="margin-top:5%; max-width:50%" class="container container2 ">
<br>
    <center>
        <h1 class="center">Welcome to APE Gaming!</h1>
    </center>
    <img class="center" src ="<?php echo base_url('assets/Images/bg-logo.png');?>" style="width: 50%;">
    <h4 class="center">Please log in to start your gaming experience</h4>
    <!-- <div id="info"><?php if ($error!=null){echo "Can not login.  error: ".$error['error'];}?></div> -->
    
    
        <div style="" class="container container3 center input-group-text">
        <?php echo form_open('users/auth'); ?>
            <center>
                <label>Username </label>
                <input class="form-control" type="text" name="username" required /><br>
                <label>Password </label>
                <input class="form-control" type="password" name="password"  required/><br>
                <div style="color:red" id="info"><?php 
                if ($error!=null)
                {
                    echo $error['error'];         
                }
                ?>
                <br>
            </center>
            <input class="createForm" type="submit" name="submit" value="Login"/>
            <input id="register" class="createForm" type="button" name="submit" value="Register" />
            <br>
            <?php echo form_close(); ?>
            
            </div>
        </div>
<br>
</div>

</main>
<script>
            document.getElementById("register").onclick=function()
            {
                window.location.href="<?php echo site_url('users/register');?>";   
            };
            
            $(document).ready(function() {
                $("#header2").hide();
            });
 </script>

</body>
</html>

