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
                                <label class="control-label" for="book_genre">Genres*</label><i class="bar"></i><br>
                                <select name="genre" id="book_genre" name="book_genre" required="required">
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
                                <label class="control-label" for="book_title">Book Title*</label><br>
                                <input type="text" id="book_title" name="book_title" required="required" placeholder="Enter your book title"/>
                                        <i class="bar"></i>
                                        <i class="input-error">Please enter a book name</i>
                                </div>
                                <!-- Book Author -->
                                <div class="form-group">
                                <label class="control-label" for="book_author">Author*</label><br>
                                <input type="text" id="book_author" name="book_author" required="required" placeholder="Enter book author"/>
                                        <i class="bar"></i>
                                        <i class="input-error">Please enter book author</i>			 
                                </div>
                                <!-- Book condition -->
                                <div class="form-group">
                                <label class="control-label" for="book_cond">Condition*</label><i class="bar"></i><br>
                                <select name="book_cond" id="book_cond" required="required">
                                    <option value="new">New</option>
                                    <option value="like_new">Like New</option>
                                    <option value="used">Used</option>
                                </select>
                                </div>
                                <!-- Submit a button -->
                                <div class="text-xs">
                                    <button class="btn btn-primary">Publish a book</button>
                                </div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    