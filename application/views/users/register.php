</head>
 <body>

<div class="container container2">
    <center>
        <h1>New to APE Gaming, eh?</h1>
        <h2>Register</h2>
    </center>
    
    <div style="color:red" id="info"><?php 
        if ($info!=null)
        {
            echo '*'.$info['message'];         
         }
         ?>
    </div>
    
    <div class="container container3 center5 input-group-text">
        <?php echo form_open('users/save_register'); ?>
             
            <label>First Name:</label>
            <input class="form-control" type="text" name="fname" required><br />
       
            <label>Last Name:</label>
            <input class="form-control" type="text" name="lname" required><br />
       
            <label>Email</label>
            <input class="form-control" type="email" name="email" required><br />
        
            <label>Username</label>
            <input class="form-control" type="text" name="username" pattern=".{3,15}" title="Must be 3-15 characters" required><br>
            <label>Password</label>
            <input class="form-control" type="password" name="password"  pattern=".{4,}" title="Four or more characters" required><br>
            
            <label>Confirm Password</label>
            <input class="form-control" type="password" name="confirmPassword" pattern=".{4,}" title="Four or more characters" required><br>
       
            <input class="createForm" type="submit" name="submit" value="Continue">
            <input id="cancel" class="createForm" type="button" name="submit" value="Cancel">
            <br>
        <?php echo form_close(); ?>
   </div>
   <br>
</div>

<script>
            document.getElementById("cancel").onclick=function()
            {
                window.location.href="<?php echo site_url('users/login');?>";   
            };
            
            $(document).ready(function() {
                $("#header2").hide();
            });

 </script>
