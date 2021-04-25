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
                                <th scope="col">Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="row-1" class="table-row" data-href="<?php echo site_url('Intro/book_description');?>">
                                <td class="w-25">
                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('images/books_images/921.jpg');?>" alt=""></img>
                                </td>
                                <td>The Lovely Bones</td>
                                <td>Alice Sebold</td>
                                <td>3.82</td>
                            </tr>
                            <tr id="row-2" class="table-row" data-href="<?php echo site_url('Intro/book_description');?>">
                                <td class="w-25">
                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('images/books_images/922.jpg');?>" alt=""></img>
                                </td>
                                <td>The Girl on the Train</td>
                                <td>Paula Hawkins</td>
                                <td>3.93</td>
                            </tr>
                            <tr id="row-3" class="table-row" data-href="<?php echo site_url('Intro/book_description');?>">
                                <td class="w-25">
                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('images/books_images/923.jpg');?>" alt=""></img>
                                </td>
                                <td>The Bright & the Pale</td>
                                <td>Jessica Rubinkowski</td>
                                <td>3.80</td>
                            </tr>
                            <tr id="row-4" class="table-row" data-href="<?php echo site_url('Intro/book_description');?>">
                                <td class="w-25">
                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('images/books_images/924.jpg');?>" alt=""></img>
                                </td>
                                <td>Sing Me Forgotten</td>
                                <td>Jessica S. Olson</td>
                                <td>4.06</td>
                            </tr>
                            <tr id="row-5" class="table-row" data-href="<?php echo site_url('Intro/book_description');?>">
                                <td class="w-25">
                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('images/books_images/924.jpg');?>" alt=""></img>
                                </td>
                                <td>Harry Potter and the Sorcerer's Stone</td>
                                <td>J.K. Rowling</td>
                                <td>4.48</td>
                            </tr>
                            <tr id="row-6" class="table-row" data-href="<?php echo site_url('Intro/book_description');?>">
                                <td class="w-25">
                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('images/books_images/924.jpg');?>" alt=""></img>
                                </td>
                                <td>The Girl on the Train</td>
                                <td>Paula Hawkins</td>
                                <td>3.93</td>
                            </tr>
                            <tr id="row-7" class="table-row" data-href="<?php echo site_url('Intro/book_description');?>">
                                <td class="w-25">
                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('images/books_images/924.jpg');?>" alt=""></img>
                                </td>
                                <td>The Girl on the Train</td>
                                <td>Paula Hawkins</td>
                                <td>3.93</td>
                            </tr>
                            <tr id="row-8" class="table-row" data-href="<?php echo site_url('Intro/book_description');?>">
                                <td class="w-25">
                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('images/books_images/928.jpg');?>" alt=""></img>
                                </td> 
                                <td>The Help</td>
                                <td>Kathryn Stockett</td>
                                <td>4.46</td> <!--To get with API? Goodreads / Google books-->
                            </tr>
                            <tr id="row-9" class="table-row" data-href="<?php echo site_url('Intro/book_description');?>">
                                <td class="w-25">
                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('images/books_images/929.jpg');?>" alt=""></img>
                                </td>
                                <td>Memoirs of a Geisha</td>
                                <td>Kathryn Stockett</td>
                                <td>4.12</td>
                            </tr>
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
        var active = document.getElementById("ind");
        active.classList.add("is-active");
        }

        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>

