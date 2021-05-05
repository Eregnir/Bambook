        <!-- This page will show an outgoing swap request and let the user see its details
        (status, selected book for swap..),
        contact info if approved or cancel the request. -->

        <!-- Variables from controller:

        flag = swap flag checks if a book was selected by the requested user or not
        other_user = The other user's information (the requested user)
        book2 = All of the data on the received book (if selected) 
        book_info = All the data on the desired book
        book_info2 = Swap info and the desired book info 

         -->
        <main class="mdl-layout__content text-center">
            <div class="mdl-grid portfolio-max-width">
                Test
                <?php foreach ($book_info2 as $bi):
                echo $bi->swap_status; 
                endforeach ?>
  
            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    <script>
        document.getElementById("apr").onclick=function()
        {
            var x = confirm("Approving the request will swap the books here on Bambook, and will share your contact info to each other for making the swap. Continue?");
            if (x==true){
                document.getElementById("approve_btn").click();
                };
            };

        document.getElementById("cancel").onclick=function()
        {
            var t = confirm("Are you sure you want to cancel this swap?");
            if (t==true){
                document.getElementById("cancel1").click();
                };
            };

        document.getElementById("img1").onclick=function()
        {
            document.getElementById("browse").click();
            };

    </script>