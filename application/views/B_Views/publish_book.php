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
                                        
                                        <!-- Submit a button -->
                                        <div class="text-xs"><br>
                                            <button class="btn btn-primary">Publish a book</button>
                                        </div>
                                    </form>
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="bmd-label-floating">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1">
                                            <span class="bmd-help">We'll never share your email with anyone else.</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="bmd-label-floating">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect1" class="bmd-label-floating">Example select</label>
                                            <select class="form-control" id="exampleSelect1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect2" class="bmd-label-floating">Example multiple select</label>
                                            <select multiple class="form-control" id="exampleSelect2">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea" class="bmd-label-floating">Example textarea</label>
                                            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile" class="bmd-label-floating">File input</label>
                                            <input type="file" class="form-control-file" id="exampleInputFile">
                                            <small class="text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                        </div>
                                        <div class="radio">
                                            <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                            Option one is this and that&mdash;be sure to include why it's great
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            Option two can be something else and selecting it will deselect option one
                                            </label>
                                        </div>
                                        <div class="radio disabled">
                                            <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                                            Option three is disabled
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox"> Check me out
                                            </label>
                                        </div>
                                        <button class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary btn-raised">Submit</button>
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