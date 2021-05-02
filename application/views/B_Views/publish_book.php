        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <!-- <h2 class="pad5">Publish a book</h2>  -->
                    <div class="container">
                    <form>
                        <h1>Publish a book</h1>
                        <div class="form-group">
                        <select name="genre" id="book_genre" name="book_genre" required="required">
                            <option value="fantasy">Fantasy</option>
                            <option value="mystery">Mystery</option>
                            <option value="romance">Romance</option>
                            <option value="thrillers">Thrillers</option>
                            <option value="biography">Biography</option>
                            <option value="inspirational">Inspirational</option>
                            <option value="other">Other</option>
                        </select>
                        <label class="control-label" for="book_genre">Genres*</label><i class="bar"></i>
                        </div>
                        <div class="form-group">
                        <input type="text" id="book_title" name="book_title" required="required" placeholder="Enter your book title"/>
                        <label class="control-label" for="book_title">Book Title*</label>
                                <i class="bar"></i>
                                <i class="input-error">Please enter a book name</i>
                        </div>
                        <div class="form-group">
                        <input type="text" id="book_author" name="book_author" required="required" placeholder="Enter book author"/>
                        <label class="control-label" for="book_author">Author*</label>
                                <i class="bar"></i>
                                <i class="input-error">Please enter book author</i>			 
                        </div>
                        <div class="form-group">
                        <select name="book_cond" id="book_cond" required="required">
                            <option value="new">New</option>
                            <option value="like_new">Like New</option>
                            <option value="used">Used</option>
                        </select>
                        <label class="control-label" for="book_cond">Condition*</label><i class="bar"></i>
                        </div>
                    </form>
                    <div class="button-container">
                        <button class="button" type="button"><span>Publish Book</span></button>
                    </div>
                    </div>
            </div>
        </main>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>