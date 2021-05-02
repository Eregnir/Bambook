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
                                        <div class="mdl-selectfield mdl-js-selectfield">
                                        <label class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label" for="book_genre">Genres*</label><i class="bar"></i><br>
                                        <select class="mdl-selectfield__select" name="genre" id="book_genre" name="book_genre" required="required">
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
                                        <div class="mdl-textfield mdl-js-textfield">
                                            <label class="mdl-textfield__label" for="book_title">Book Title*</label><br>
                                            <input class="mdl-textfield__input" type="text" id="book_title" name="book_title" required="required" placeholder="Enter your book title"/>
                                            <span class="mdl-textfield__error">Please enter a book name</span>
                                        </div>
                                        <!-- Book Author -->
                                        <div class="mdl-textfield mdl-js-textfield">
                                            <label class="mdl-textfield__label" for="book_author">Author*</label><br>
                                            <input class="mdl-textfield__input" type="text" id="book_author" name="book_author" required="required" placeholder="Enter book author"/>
                                            <span class="mdl-textfield__error">Please enter book author</span>			 
                                        </div>
                                        <!-- Book condition -->
                                        <div class="mdl-selectfield mdl-js-selectfield">
                                        <label class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label" for="book_cond">Condition*</label>
                                        <select class="mdl-selectfield__select" name="book_cond" id="book_cond" required="required">
                                            <option value="new">New</option>
                                            <option value="like_new">Like New</option>
                                            <option value="used">Used</option>
                                        </select>
                                        </div>
                                        <!-- Simple Select with arrow -->
                                        <div class="mdl-selectfield mdl-js-selectfield">
                                            <select id="myselect" name="myselect" class="mdl-selectfield__select">
                                                <option value=""></option>
                                                <option value="option0_value">option 0</option>
                                                <option value="option1_value">option 1</option>
                                            </select>
                                            <label class="mdl-selectfield__label" for="myselect">Choose option</label>
                                        </div>
                                        <!-- Submit a button -->
                                        <div class="text-xs"><br>
                                            <button class="btn btn-primary">Publish a book</button>
                                        </div>
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