        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <span class="material-icons">mark_email_unread</span><h2 class="pad5">Received Requests</h2>
                <!-- Received requests -->
                <?php 
                if (empty($requests_in)): ?>
                        <div class="mdl-cell mdl-cell--12-col mdl-card text-center mdl-shadow--2dp">
                            <span id="img1" class="card-img-top text-center"> <img style="max-width:200px;" class="card-img-top" alt="No Books" src='<?php echo base_url('images/empty_cart2.png');?>'> </span>
                            <h4>You don't have any incoming requests yet,<br>
                                But if you add more books, you'll get more requests! </h4><br>
                            
                            <button id = "aab" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent text-center" style="max-width:150px; display:block; margin:auto;" type="button" name="submit ">
                                    Publish a book
                            </button>
                        </div>
                    

                <?php endif;
                
                if (!empty($requests_in)):
                ?>
                
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for the book or author name..." title="Type in a name">
                <br>
                <table class="table table-image" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Requested Book</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Sent By</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach ($requests_in as $req):
                    
                    //Open a form that will send the book UID to the controller in order to show it's full details.
                            $attributes = array('id' => $req->UID, 'name' =>$req->UID);?>
                            <tr id="<?php echo '_'.$req->swap_UID?>" class="table-row" onclick="submitit(this.id)">
                                <td class="w-25">
                                <!-- Open a form that will send the swap UID to the controller in order to select it and show the full request details and options. -->                                     
                                <?php echo form_open('Books/zoom_swap', $attributes); ?>
                                <!-- need to change some info here... b_UID etc and complete the correct form for the swap ID -->
                                    <input type="hidden" value="<?php echo $req->swap_UID;?>" name="swap_UID" id="<?php echo $req->swap_UID?>"> 
                                    <span class="img-fluid"> <img src="<?php echo base_url('images/user_uploads/'.$req->img_title);?>" alt="Book Photo" style="max-height:200px; max-width: 100%;"> <br></span>

                                    <button id="<?php echo 'submit_'.$req->swap_UID;?>" class="mdl-button mdl-js-button mdl-button--icon hidden" type="submit" name="submit "><i class="material-icons">open_in_new</i></button>
                                <?php echo form_close(); ?>
                                </td>
                                <td> <?php echo $req->title ?></td>
                                <td> <?php echo $req->swap_status?></td>
                                <td> <?php echo $req->sent_by_username?></td>
                            </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table> <br><br><br>
                
                <?php endif; ?>

                <span class="material-icons">send</span>&nbsp;<h2>Sent Requests</h2>
                <!-- Sent requests -->
                <input type="text" id="myInput2" onkeyup="myFunction()" placeholder="Search for the book or author name..." title="Type in a name">
                <br>
                <table class="table table-image" id="myTable2">
                    <thead>
                        <tr>
                            <th scope="col">Requested Book</th>
                            <th scope="col">Title</th>
                            <th scope="col">Sent To</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                    <?php foreach ($requests_out as $req):
                            $attributes = array('id' => $req->UID, 'name' =>$req->UID);?>
                            <tr id="<?php echo '_'.$req->swap_UID?>" class="table-row" onclick="submitit2(this.id)">
                                <td class="w-25">
                                <!-- Open a form that will send the swap UID to the controller in order to select it and show the full request details and options. -->                                     
                                <?php echo form_open('Books/zoom_swap_out', $attributes); ?>
                                <!-- need to change some info here... b_UID etc and complete the correct form for the swap ID -->
                                    <input type="hidden" value="<?php echo $req->swap_UID;?>" name="swap_UID" id="swap_<?php echo $req->swap_UID?>">                                     
                                    <span class="img-fluid"> <img src="<?php echo base_url('images/user_uploads/'.$req->img_title);?>" alt="Book Photo" style="max-height:200px; max-width: 100%;"> <br></span>

                                    <button id="<?php echo 'submit2_'.$req->swap_UID;?>" class="mdl-button mdl-js-button mdl-button--icon hidden" type="submit" name="submit "><i class="material-icons">open_in_new</i></button>
                                <?php echo form_close(); ?>
                                </td>
                                <td> <?php echo $req->title ?></td>
                                <td> <?php echo $req->sent_to_username ?></td>
                                <td> <?php echo $req->swap_status ?></td>
                            </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                    
                <script>
                    $(document).ready(function(){
                        $("#myInput").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#myTable tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });

                    $(document).ready(function(){
                    $("#myInput2").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable2 tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });

                    //view incoming requests
                    function submitit(id)
                            {
                                var str1 = id;
                                var str2 = 'submit';
                                var res = str2.concat(str1);
                                // window.alert(res)
                                document.getElementById(res).click();
                                
                                };

                     //view outgoing requests
                     function submitit2(id)
                            {
                                var str1 = id;
                                var str2 = 'submit2';
                                var res = str2.concat(str1);
                                // window.alert(res)
                                document.getElementById(res).click();
                                
                                };


                </script>
            <!-- Books table end -->
        </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    <script>
    // window.onload = function(){
    //     var active = document.getElementById("blg");
    //     active.classList.add("is-active");
    //     }
    
    document.getElementById("aab").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/publish_book');?>";   
    };

    // $(document).ready(function($) {
    //     $(".table-row").click(function() {
    //         window.document.location = $(this).data("href");
    //     });
    // });

    

    </script>

