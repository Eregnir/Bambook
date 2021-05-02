s<main class="mdl-layout__content">
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
                                <div class="mdl-color--whitemdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                                    <div class="mdl-cell mdl-cell--2-col">
                                        <div class="mdl-selectfield mdl-js-selectfield" style="width:100px">
                                            <select id="profile_information_form_dob_2i_1" name="profile_information_form[dob(2i)_1]" class="date required mdl-selectfield__select" required>
                                                <option value=""></option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            <label for="profile_information_form_dob_2i_1" class="mdl-selectfield__label">MM</label>
                                            <span class="mdl-selectfield__error">Input is not a empty!</span>
                                        </div>
                                    </div>
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
</main

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    