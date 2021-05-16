        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <!-- Books table Start -->
                    <h2 class="pad5">My Library</h2>

                    <?php  if (empty($books)): ?>
                        <div class="mdl-cell mdl-cell--12-col mdl-card text-center">
                        <!-- <span id="img1" class="card-img-top"> <img style="width:50%" class="card-img-top" alt="No Books" src='<?php echo base_url('images/books_images/ohno.webp');?>'> </span> -->
                        <h3>You don't have any books listed on Bambook...<br>
                        But that can all be changed, right now! </h3>
                        
                        <!-- <button id = "aab" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="button" name="submit ">
                                List a book
                            </button> -->
                        </div>
                    <?php if (!empty($books)): ?>
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
                        <?php foreach ($books as $book):
                        //Open a form that will send the book UID to the controller in order to show it's full details.
                                $attributes = array('id' => $book->UID, 'name' =>$book->UID);?>
                                <tr id="<?php echo '_'.$book->UID?>" class="table-row" onclick="submitit(this.id)">
                                    <td class="w-25">
                                    <!-- Open a form that will send the avatar UID to the controller in order to select it and change the avatar. -->                                     
                                    <?php echo form_open('Books/my_book', $attributes); ?>
                                        <input type="hidden" value="<?php echo $book->UID;?>" name="b_UID" id="<?php echo $book->UID?>"> 
                                        <span class="img-fluid"> <img src="<?php echo base_url('images/user_uploads/'.$book->img_title);?>" class="card-img-top" alt="Book_Img" style="max-height:200px; max-width: 100%;"> <br></span>
                                        <button id="<?php echo 'submit_'.$book->UID;?>" class="mdl-button mdl-js-button mdl-button--icon hidden" type="submit" name="submit "><i class="material-icons">open_in_new</i></button>
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
                <?php endif ?>
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

