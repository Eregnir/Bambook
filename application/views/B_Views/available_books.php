        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <!-- Books table Start -->
                    <h2 class="pad5">Available Books</h2>
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
                            $attributes = array('id' => $book->UID, 'name' =>$book->UID);
                            echo form_open('Books/single_book', $attributes); ?>
                            <input type="hidden" value="<?php echo $book->UID;?>" name="b_UID" id="<?php echo 'book_'.$book->UID?>"> 
                            
                                <tr id="<?php echo $book->UID?>" class="table-row">
                                    <td class="w-25">
                                        <span class="img-fluid"> <?php echo '<img style="max-height:200px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $book->img).'"/>';?> <br></span>
                                        <button class="mdl-button mdl-js-button mdl-button--primary" type="submit" name="submit ">
                                    <center>Show me!</center>
                                </button>
                                    </td>
                                    <td> <?php echo $book->title ?> </td>
                                    <td> <?php echo $book->author ?> </td>
                                    <td> <?php echo $book->cond ?> </td>
                            <?php echo form_close(); ?>
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

        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });

    function findBook(id){
        document.getElementById(id).submit();
    }
    </script>

