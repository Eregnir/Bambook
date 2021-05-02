        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 m-x-auto pull-xs-none offset-3"> <!--offset-3 to center the div-->
                            <div class="jumbotron">
                                <h2 class="h2-responsive"><strong>Publish a book</strong></h2><br>
                                <!-- <hr class="m-y-2"> -->

                                <!--Naked Form-->
                                <div class="card-block">

                                    <!--Body-->
                                    <form action="#">
                                        <!-- Book Genre -->
                                        <div class="form-group">
                                            <label for="book_genre" class="bmd-label-floating">Genre*</label>
                                            <select class="form-control" name="book_genre" id="book_genre" name="book_genre" required="required">
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
                                            <span class="mdl-textfield__error">Please enter a book name</span>
                                        </div>
                                        <!-- Book Author -->
                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="book_author">Author*</label><br>
                                            <input class="form-control" type="text" id="book_author" name="book_author" required="required" placeholder="Enter book author"/>
                                            <span class="mdl-textfield__error">Please enter book author</span>			 
                                        </div>
                                        <!-- Book condition -->
                                        <div class="form-group">
                                            <label for="book_cond" class="bmd-label-floating">Book Condition*</label>
                                            <select multiple class="form-control" name="book_cond" id="book_cond" required="required">
                                                <option value="new">New</option>
                                                <option value="like_new">Like New</option>
                                                <option value="used">Used</option>
                                            </select>
                                        </div>
                                        <!-- Book Description -->
                                        <div class="form-group">
                                            <label for="book_desc" class="bmd-label-floating">Book Description</label>
                                            <textarea class="form-control" name="book_desc" id="book_desc" rows="3"></textarea>
                                        </div>
                                        <!-- Upload Image -->
                                        <div class="form-group">
                                            <label for="exampleInputFile" class="bmd-label-floating">File input</label>
                                            <input type="file" class="form-control-file" id="exampleInputFile">
                                            <small class="text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" accept="image/*" id="file-input">
                                            <script>
                                            const fileInput = document.getElementById('file-input');

                                            fileInput.addEventListener('change', (e) => doSomethingWithFiles(e.target.files));
                                            </script>
                                        </div>
                                        <!-- Submit button -->
                                        <button class="btn btn-primary">Publish a book</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


        <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>