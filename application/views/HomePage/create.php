<main id="mainWrraper">

<h2>Add User</h2>

<div id="info"><?php if ($error!=null){echo "Can not create user.  error: ".$error['message'];}?></div>
<?php echo form_open('users/save_user'); ?>

    <label>Id</label>
    <input type="text" name="id" /><br />

    <label>Name</label>
    <input type="text" name="name" required /><br>
    <label>Password</label>
    <input type="password" name="password"  required/><br>
   
    <input class="createForm" type="submit" name="submit" value="Create User"/>
    <input id="cancel" class="createForm" type="button" name="submit" value="Cancel" />
<?php echo form_close(); ?>

</main>
<script>
            document.getElementById("cancel").onclick=function()
            {
                window.location.href="<?php echo site_url('users/get_users');?>";   
            };
 </script>



