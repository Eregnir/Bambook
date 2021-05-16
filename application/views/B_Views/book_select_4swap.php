        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <?php if ($books):?>
                    <!-- Books table Start -->
                    <h2 class="pad5">Browsing Books for Swap: </h2>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for the book or author name..." title="Type in a name">
                    <br>
                    <table class="table table-image" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Condition</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <!-- Loop Books -->
                        <?php foreach ($books as $book):
                                $attributes = array('id' => $book->UID, 'name' =>$book->UID);?>
                                <tr id="<?php echo '_'.$book->UID?>" class="table-row" onclick="submitit(this.id)">
                                    <td class="w-25">
                                    <!-- Open a form that will send the swap_UID and the book_UID in order to select it for the swap. -->                                     
                                    <?php echo form_open('Books/select_book', $attributes); ?>
                                        <input type="hidden" value="<?php echo $book->UID;?>" name="b_UID" id="<?php echo $book->UID?>"> 
                                        <input type="hidden" value="<?php echo $swap_UID;?>" name="swap_UID" id="swap_<?php echo $book->UID?>">
                                        <!-- Old image <span class="img-fluid"> <?php echo '<img style="max-height:200px; max-width: 100%; cursor: pointer;" src="data:image/jpeg;base64,'.base64_encode( $book->img).'"/>';?> <br></span> -->
                                        <span class="img-fluid"> <img style="max-height:200px; max-width: 100%; cursor: pointer;" src="<?php echo base_url('images/user_uploads/'.$book->img_title);?>" class="card-img-top" alt="Book Photo"> <br></span>

                                        <button id="<?php echo 'submit_'.$book->UID;?>" class="mdl-button mdl-js-button mdl-button--raised hidden" type="submit" name="submit ">Select Book</button>
                                    <?php echo form_close(); ?>
                                    </td>
                                    <td> <?php echo $book->title ?></td>
                                    <td> <?php echo $book->author ?></td>
                                    <td> <?php echo $book->cond ?></td>
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

                        function submitit(id)
                        {
                            var str1 = id;
                            var str2 = 'submit';
                            var res = str2.concat(str1);
                            // window.alert(res)
                            document.getElementById(res).click();
                            
                            };
                    </script>
                <!-- Books table end -->

                    <?php 
                    endif;
                    if(!$books):?>

                <div class="mdl-grid portfolio-max-width">
                    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset"> <!-- centered div -->
                    <span id="img1" class="card-img-top text-center"> <img style="max-width:200px;" class="card-img-top text-center" alt="No Books" src='<?php echo base_url('images/empty_cart2.png');?>'> </span>

                        <h4>
                            Oh no! <br>
                            This user has no available books to choose from, and the swap request cannot be completed.<br>
                            <button id = "bkb" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent text-center" type="button" style="max-width:150px; display:block; margin:auto;" name="submit ">
                                    Back to Requests
                                </button>
                            <br>
                        </h4>
                    </div>
                </div>
                    <?php endif ?>

            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    <script>
    // window.onload = function(){
    //     var active = document.getElementById("blg");
    //     active.classList.add("is-active");
    //     }
    
    document.getElementById("bkb").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/my_requests');?>";   
    };
    // $(document).ready(function($) {
    //     $(".table-row").click(function() {
    //         window.document.location = $(this).data("href");
    //     });
    // });

    </script>

