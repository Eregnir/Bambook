        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <!-- Books table Start -->
                    <h2 class="pad5">Available Books</h2>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for the book or author name..." title="Type in a name">
                    <br>
                    <table class="table table-image" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col" id="availableBookImg">Image</th>
                                <th scope="col" id="availableBookTitle">Title</th>
                                <th scope="col" id="availableBookAuthor">Author</th>
                                <th scope="col" id="availableBookCond">Condition</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php foreach ($books as $book):
                        //Open a form that will send the book UID to the controller in order to show it's full details.
                                $attributes = array('id' => $book->UID, 'name' =>$book->UID);?>
                                <tr id="<?php echo 'book_'.$book->UID?>" class="table-row" onclick="submitit(this.id)">
                                    <td class="w-25">
                                        <!--Open the form -->
                                    <?php echo form_open('Books/single_book', $attributes); ?>
                                        <input type="hidden" value="<?php echo $book->UID;?>" name="b_UID" id="<?php echo $book->UID?>"> 
                                        <!-- OLD IMAGE <span class="img-fluid"> <?php echo '<img style="max-height:200px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $book->img).'"/>';?> <br></span> -->
                                        <span class="img-fluid"> <img src="<?php echo base_url('images/user_uploads/'.$book->img_title);?>" alt="Book Photo" style="max-height:200px; max-width: 100%;"> <br></span>

                                        <button id="<?php echo 'submit_'.$book->UID;?>" class="mdl-button mdl-js-button mdl-button--icon" type="submit" name="submit "><i class="material-icons">open_in_new</i></button>
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
                                var button =document.getElementById(id);
                                button.click();
                                alert(button);
                                };

                    </script>
                <!-- Books table end -->
            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    <script>
    window.onload = function(){
        var active = document.getElementById("blg");
        active.classList.add("is-active");
        }
    

    // $(document).ready(function($) {
    //     $(".table-row").click(function() {
    //         window.document.location = $(this).data("href");
    //     });
    // });

    </script>

