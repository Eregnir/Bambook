        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <!-- Books table Start -->
                    <h2 class="pad5">Available Books</h2>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for the book or author name..." title="Type in a name">
                    <br>
                    <?php
                    foreach($books as $book){
                        echo '<img style="max-height:200px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $book->img).'"/>';
                    }
                    ?>
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
                        <?php foreach ($books as $book):?>
                                <tr id="<?php echo $book->UID?>" class="table-row">
                                    <td class="w-25">
                                        <img class="img-fluid img-thumbnail" src="<?php echo '<center><img style="max-height:200px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $book->img).'"/></center>';?>" alt=""></img>
                                    </td>
                                    <td> <?php echo $book->title?> </td>
                                    <td> <?php echo $book->author?> </td>
                                    <td> <?php echo $book->cond?> </td>
                                </tr>
                        </tbody>
                    </table>
                        <?php endforeach; ?>
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
    
    document.getElementById("<?php echo $book->UID?>").onclick=function()
    {
        document.getElementById("<?php echo $book->UID?>").submit();  
    };

    </script>

