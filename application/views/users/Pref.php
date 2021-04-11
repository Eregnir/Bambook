</head>
 <body>
<main id="mainWrraper">

<div style="margin-top:5%" class="container container2">
    <center>
        <h1>Just one more step!</h1>
        <h2>Set User Preferences</h2></center>
    <div id="info"><?php 
        if ($info!=null)
        {
            echo $info['message'];}
         ?>
    </div>
    <?php 
        $user=$this->session->all_userdata();
    ?>
    <?php echo form_open('Users/save_pref'); ?>
        <center>
        <br>
           <div class="container container3 center5 input-group-text">
                <div class="btn-group center container " style="margin-top:15px;" role="group" aria-label="Basic checkbox toggle button group">
                    <h3>Select the gaming consoles you own!</h3>
                    <input type="checkbox" name="ps" value="1" class="btn-check" id="btnc1" autocomplete="off">
                    <label style="border-radius: 15px;" class="btn btn-outline-primary" for="btnc1">Playstation</label>
                    
                    <input type="checkbox" name="pc" value="1" class="btn-check" id="btnc2" autocomplete="off" >
                    <label style="border-radius: 15px;" class="btn btn-outline-primary" for="btnc2">PC</label>
                    
                    <input type="checkbox" name="xbox" value="1" class="btn-check" id="btnc3" autocomplete="off">
                    <label style="border-radius: 15px;" class="btn btn-outline-primary" for="btnc3">XBOX</label>
                    <br>
                </div>
                
                <div class="btn-group center container " style="margin-top:15px;" role="group" aria-label="Basic checkbox toggle button group">
                    <h3>Select <u>one</u>, your favorite genre:</h3>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input required type="radio" class="btn-check" name="genre" value="Racing" id="btnradio1" autocomplete="off" checked>
                    <label style="border-radius: 15px;" class="btn btn-outline-primary" for="btnradio1">Racing</label>
               
                    <input type="radio" class="btn-check" name="genre" value="Sports" id="btnradio2" autocomplete="off">
                    <label style="border-radius: 15px; margin-right: 5px; margin-left: 5px;" class="btn btn-outline-primary" for="btnradio2">Sports</label>
               
                    <input type="radio" class="btn-check" name="genre" value="Action" id="btnradio3" autocomplete="off">
                    <label style="border-radius: 15px;" class="btn btn-outline-primary" for="btnradio3">Action</label>
                    </div>
                    <br>
                </div>
                <input type="hidden" value="<?php echo $user['username'];?>" name="p_username" /><br />

                <input class="createForm" type="submit" name="submit" value="Register"/>
                <input id="cancel" class="createForm" type="button" name="submit" value="Cancel" />
               </div>

        </center>

            <br>
    <?php echo form_close(); ?>
</div>

</main>
<script>
            document.getElementById("cancel").onclick=function()
            {
                window.location.href="<?php echo site_url('users/login');?>";   
            };
            
            $(document).ready(function() {
                $("#header2").hide();
            });
 </script>

</body>
</html>

