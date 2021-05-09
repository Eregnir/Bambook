        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <div class="container">
                    <div class="d-flex justify-content-center"> 
                        <div class="col-md-7 m-x-auto pull-xs-none"> 
                            <div class="jumbotron">
                                <h2 class="h2-responsive"><strong>Publish a book</strong></h2><br>
                                <!-- <hr class="m-y-2"> -->
                                <!--Naked Form-->
                                <div class="card-block" id="scrollUpHere">
                                    <!--Body-->
                                    <?php 
                                    $att = array('enctype' => 'multipart/form-data');
                                    echo form_open('Books/upload_image', $att); ?>
                                    <!-- <form id="publish_book_form" action="#"> -->
                                        <!-- Book Genre -->
                                        <div class="form-group">
                                            <label for="book_genre" class="bmd-label-floating">Genre</label>
                                            <select class="form-control" name="book_genre" id="book_genre" name="book_genre" required="required">
                                                <option value="" disabled default selected>--Select--</option>
                                                <option value="fantasy">Fantasy</option>
                                                <option value="mystery">Mystery</option>
                                                <option value="romance">Romance</option>
                                                <option value="thrillers">Thrillers</option>
                                                <option value="biography">Biography</option>
                                                <option value="inspirational">Inspirational</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <!-- Book Title -->
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="book_title">Book Title*</label><br>
                                            <input class="form-control" type="text" id="book_title" name="book_title" required="required" placeholder="Enter your book title"/>
                                        </div>
                                        <!-- Book Author -->
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="book_author">Author*</label><br>
                                            <input class="form-control" type="text" id="book_author" name="book_author" required="required" placeholder="Enter book author"/>	 
                                        </div>
                                        <!-- Book Language -->
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="book_language">Language*</label><br>
                                            <input class="form-control" type="text" id="book_language" name="book_language" required="required" placeholder="Enter book language"/>		 
                                        </div>
                                        <!-- Book ISBN -->
                                        <div class="form-group">
                                            <input class="form-control" type="hidden" id="b_isbn" name="b_isbn"/>
                                        </div>
                                        <!-- Book condition -->
                                        <div class="form-group">
                                            <label for="book_cond" class="bmd-label-floating">Book Condition*</label>
                                            <select class="form-control" name="book_cond" id="book_cond" name="book_cond" required="required">
                                                <option value="" disabled default selected>--Select--</option>
                                                <option value="new">New</option>
                                                <option value="like_new">Like New</option>
                                                <option value="used">Used</option>
                                            </select>
                                        </div>
                                        <!-- Upload Image -->
                                        <div class="form-group">
                                            <label for="file-input" class="bmd-label-floating">Upload image</label>
                                            <!-- <input type="file" class="form-control-file" accept="image/*" id="file-input" name="file-input"> -->
                                            
                                            <input type="file" name="fields_upload[multi_edit][0][b798abe6e1b1318ee36b0dcb3fb9e4d3]" class="textfield noDragDrop form-control-file" id="field_2_3" size="10" onchange="return verificationsAfterFieldChange('b798abe6e1b1318ee36b0dcb3fb9e4d3', '0','mediumblob')">
                                            
                                            <small class="text-muted">Take a photo of your book from your mobile device or upload a photo from your gallery.</small>
                                            <script>
                                            const fileInput = document.getElementById('file-input');

                                            fileInput.addEventListener('change', (e) => doSomethingWithFiles(e.target.files));
                                            </script>
                                        </div>
                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary">Publish a book</button>
                                    <!-- </form> -->
                                    <?php echo form_close(); ?>
                                </div>
                                <!-- Search Book using Google API -->
                                <h5 class="h5-responsive">Search your book name & save time on the upload</h5>
                                <div id="search">
                                    <form id="search_form">
                                        <input type="text" class="form-control" id="search_txt" placeholder="Book title, author or ISBN"/><br>
                                        <button class="mdl-button mdl-js-button mdl-button--raised">
                                            Search Books
                                        </button>
                                        <!-- <input type="submit" value="Search Books"> -->
                                    </form>
                                </div>
                                <br>
                                <div id="books"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


        <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

                                <!-- JS for Google API search -->

                                <script>


                                    $("#search_form").submit(function(e) {
                                        $("#books").html("");

                                        e.preventDefault();

                                        var searchQuery = $("#search_txt").val();
                                        searchQuery = searchQuery.split(" ").join("+");

                                        if (!searchQuery) {
                                            searchQuery = "Harry Potter"; // defauly query
                                        }

                                        $.ajax({
                                            url: "https://www.googleapis.com/books/v1/volumes?q=" + searchQuery,
                                            success: function(json) {
                                            var thumb = "";
                                            var htmlcontent = "";
                                            var author = "";
                                            var p_date = "";
                                            var language = "";
                                            var isbn = "";

                                            for (i = 0; i < json.items.length; i++) {
                                                if (typeof json.items[i].volumeInfo.imageLinks != "undefined") {
                                                thumb = json.items[i].volumeInfo.imageLinks.smallThumbnail;
                                                } else {
                                                thumb = "http://i.imgur.com/oM3MdAi.png"; // image not available
                                                // thumb = 'http://slems-oldboys.org.uk/library/wp-content/uploads/2013/11/library_nocover.jpg'
                                                }
                                                // Author
                                                if (typeof json.items[i].volumeInfo.authors != "undefined") {
                                                author = json.items[i].volumeInfo.authors[0];
                                                }
                                                
                                                // Published Date
                                                if (typeof json.items[i].volumeInfo.publishedDate != "undefined") {
                                                p_date = json.items[i].volumeInfo.publishedDate;
                                                }

                                                // Language
                                                if (typeof json.items[i].volumeInfo.language != "undefined") {
                                                language = json.items[i].volumeInfo.language;
                                                }

                                                // ISBN
                                                if (typeof json.items[i].volumeInfo.industryIdentifiers != "undefined") {
                                                isbn = json.items[i].volumeInfo.industryIdentifiers[0].identifier;
                                                }

                                                htmlcontent +=
                                                "<div class='thumbs' style='cursor: pointer;' onclick='autoFill("+i+");' return true;'><b>Book Title: </b>" +
                                                json.items[i].volumeInfo.title +
                                                "</b>" +
                                                '<img src="' +
                                                thumb +
                                                '" + alt="' +
                                                json.items[i].volumeInfo.title +
                                                '">' +
                                                "<br><b>Author: </b>" +
                                                author +
                                                "<br><b>Published Date: </b>" +
                                                p_date +
                                                "<br><b>Language: </b>" +
                                                language +
                                                "<br><b>ISBN_13: </b>" +
                                                isbn +
                                                '</div>';
                                            }
                                            document.getElementById("books").innerHTML =
                                                "<div>" + htmlcontent + "</div><br>";
                                            }
                                        });
                                    });

                                    function trunc(s, n) {
                                    //if(typeof s !== "undefined"){
                                    var t = s.indexOf(" ", n);
                                    if (t == -1) return s;
                                    return s.substring(0, t) + "...";
                                    // } else {
                                    //   return s;
                                    // }
                                    }

                                    function autoFill(i) {
                                        document.getElementById('book_title').value = $('.thumbs')[i].childNodes[1].wholeText; // To fix the right side the left side is working fine
                                        document.getElementById('book_author').value = $('.thumbs')[i].childNodes[5].wholeText; // to fix the right side
                                        document.getElementById('book_language').value = $('.thumbs')[i].childNodes[11].wholeText; // to fix the right side
                                        document.getElementById('b_isbn').value = $('.thumbs')[i].childNodes[14].wholeText; // to fix the right side
                                    
                                        if ($('.thumbs')[i].childNodes[11].wholeText == 'en') {
                                            document.getElementById('book_language').value = 'English';
                                        }
                                        if ($('.thumbs')[i].childNodes[11].wholeText == 'iw') {
                                            document.getElementById('book_language').value = 'Hebrew';
                                        }
                                        if ($('.thumbs')[i].childNodes[11].wholeText == 'ar') {
                                            document.getElementById('book_language').value = 'Arabic';
                                        }
                                        if ($('.thumbs')[i].childNodes[11].wholeText == 'en-GB') {
                                            document.getElementById('book_language').value = 'English';
                                        }
                                        if ($('.thumbs')[i].childNodes[11].wholeText == 'es') {
                                            document.getElementById('book_language').value = 'Spanish';
                                        }
                                        if ($('.thumbs')[i].childNodes[11].wholeText == 'ru') {
                                            document.getElementById('book_language').value = 'Russian';
                                        }
                                        
                                        document.getElementById("scrollUpHere").scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
                                   }
                                </script>