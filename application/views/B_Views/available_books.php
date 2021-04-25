        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <!-- Books table Start -->
                    <h2>Available Books</h2>

                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for the book name..." title="Type in a name">

                    <table id="myTable">
                    <tr class="header">
                        <th style="width:35%;">Image</th>
                        <th style="width:35%;">Title</th>
                        <th style="width:15%;">Author</th>
                        <th style="width:15%;">Rating</th>
                    <tr>
                        <td><img  src="<?php echo base_url('images/books_images/928.jpg');?>" alt="" height=100 width=100></img></td> 
                        <td>The Help</td>
                        <td>Kathryn Stockett</td>
                        <td>4.46</td> <!--To get with API? Goodreads / Google books-->
                    </tr>
                    <tr>
                        <td><img  src="<?php echo base_url('images/books_images/921.jpg');?>" alt="" height=100 width=100></img></td>
                        <td>The Lovely Bones</td>
                        <td>Alice Sebold</td>
                        <td>3.82</td>
                    </tr>
                    <tr>
                        <td><img  src="<?php echo base_url('images/books_images/922.jpg');?>" alt="" height=100 width=100></img></td>
                        <td>The Girl on the Train</td>
                        <td>Paula Hawkins</td>
                        <td>3.93</td>
                    </tr>
                    <tr>
                        <td><img  src="<?php echo base_url('images/books_images/929.jpg');?>" alt="" height=100 width=100></img></td>
                        <td>Memoirs of a Geisha</td>
                        <td>Kathryn Stockett</td>
                        <td>4.12</td>
                    </tr>
                    </table>

                    <script>
                    function myFunction() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("myTable");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                        }       
                    }
                    }
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
    </script>