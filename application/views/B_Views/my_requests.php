        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <div>
                    <h2 class="pad5">My Requests</h2><br>
                </div>
                <div>
                    <h4>Received Requests</h4>
                </div>
                <!-- Received requests -->
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
                            <tr id="<?php echo 'req_'.$req->swap_UID?>" class="table-row">
                                <td class="w-25">
                                <!-- Open a form that will send the swap UID to the controller in order to select it and show the full request details and options. -->                                     
                                <?php echo form_open('Books/zoom_swap', $attributes); ?>
                                <!-- need to change some info here... b_UID etc and complete the correct form for the swap ID -->
                                    <input type="hidden" value="<?php echo $req->swap_UID;?>" name="swap_UID" id="<?php echo $req->swap_UID?>"> 
                                    <span class="img-fluid"> <?php echo '<img style="max-height:200px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $req->img).'"/>';?> <br></span>
                                    <button class="mdl-button mdl-js-button mdl-button--icon" type="submit" name="submit "><i class="material-icons">open_in_new</i></button>
                                <?php echo form_close(); ?>
                                </td>
                                <td> <?php echo $req->title ?></td>
                                <td> <?php echo $req->swap_status?></td>
                                <td> <?php echo $req->sent_by_username?></td>
                            </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table> <br><br><br>


                <h4>Sent Requests</h4>
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
                            <tr id="<?php echo 'req_'.$req->swap_UID?>" class="table-row">
                                <td class="w-25">
                                <!-- Open a form that will send the swap UID to the controller in order to select it and show the full request details and options. -->                                     
                                <?php echo form_open('Books/zoom_swap_out', $attributes); ?>
                                <!-- need to change some info here... b_UID etc and complete the correct form for the swap ID -->
                                    <input type="hidden" value="<?php echo $req->swap_UID;?>" name="swap_UID" id="swap_<?php echo $req->swap_UID?>"> 
                                    <span class="img-fluid"> <?php echo '<img style="max-height:200px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $req->img).'"/>';?> <br></span>
                                    <button class="mdl-button mdl-js-button mdl-button--icon" type="submit" name="submit "><i class="material-icons">open_in_new</i></button>
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
                        $("#myTable tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
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
    

    // $(document).ready(function($) {
    //     $(".table-row").click(function() {
    //         window.document.location = $(this).data("href");
    //     });
    // });

    </script>

