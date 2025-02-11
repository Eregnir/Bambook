        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <!-- Books table Start -->
                    <h2 class="pad5">Available Books</h2>
                    <span id="tooltip5" class="material-icons">info</span>
                    <!-- Add tooltip -->
                        <div class = "mdl-tooltip" for = "tooltip5">Here you can find books that other users list as books for swap. Click a book to view it's full details.<br>
                        To find your books, choose "My Library" from the Homepage.</div>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for the book or author name..." title="Type in a name">
                    <br>
                    <!-- Table Filters -->
                    <div class="container">
                        <div class="row">

                        <?php echo form_open('Books/filter_control'); ?>
                        <div class="form-group" style="display: inline-block; width:30%;">
                            <label for="book_genre" class="bmd-label-floating">Genre</label>
                            <select class="form-control" name="book_genre" id="book_genre" name="book_genre">
                                <option value="Any" default <?php echo (isset($_POST['book_genre']) && $_POST['book_genre'] === 'Any') ? 'selected' : ''; ?>>Any</option>
                                <option value="Fantasy" <?php echo (isset($_POST['book_genre']) && $_POST['book_genre'] === 'Fantasy') ? 'selected' : ''; ?>>Fantasy</option>
                                <option value="Mystery" <?php echo (isset($_POST['book_genre']) && $_POST['book_genre'] === 'Mystery') ? 'selected' : ''; ?>>Mystery</option>
                                <option value="Romance" <?php echo (isset($_POST['book_genre']) && $_POST['book_genre'] === 'Romance') ? 'selected' : ''; ?>>Romance</option>
                                <option value="Thrillers" <?php echo (isset($_POST['book_genre']) && $_POST['book_genre'] === 'Thrillers') ? 'selected' : ''; ?>>Thrillers</option>
                                <option value="Biography" <?php echo (isset($_POST['book_genre']) && $_POST['book_genre'] === 'Biography') ? 'selected' : ''; ?>>Biography</option>
                                <option value="Inspirational" <?php echo (isset($_POST['book_genre']) && $_POST['book_genre'] === 'Inspirational') ? 'selected' : ''; ?>>Inspirational</option>
                                <option value="Other" <?php echo (isset($_POST['book_genre']) && $_POST['book_genre'] === 'Other') ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>

                        <!-- Book Lang -->
                        <div class="form-group" style="display: inline-block; width:30%;">
                            <label for="book_lang" class="bmd-label-floating">Language</label>
                                <select class="form-control" name="book_lang" id="book_lang" >
                                    <option value="Any" default <?php echo (isset($_POST['book_lang']) && $_POST['book_lang'] === 'Any') ? 'selected' : ''; ?> >Any</option>
                                    <option value="English" <?php echo (isset($_POST['book_lang']) && $_POST['book_lang'] === 'English') ? 'selected' : ''; ?>  >English</option>
                                    <option value="Hebrew" <?php echo (isset($_POST['book_lang']) && $_POST['book_lang'] === 'Hebrew') ? 'selected' : ''; ?>>Hebrew</option>
                                    <option value="Arabic" <?php echo (isset($_POST['book_lang']) && $_POST['book_lang'] === 'Arabic') ? 'selected' : ''; ?>>Arabic</option>
                                    <option value="Russian" <?php echo (isset($_POST['book_lang']) && $_POST['book_lang'] === 'Russian') ? 'selected' : ''; ?>>Russian</option>
                                    <option value="Spanish" <?php echo (isset($_POST['book_lang']) && $_POST['book_lang'] === 'Spanish') ? 'selected' : ''; ?>>Spanish</option>
                                </select>
                        </div>

                        <!-- Book cond -->
                        <div class="form-group" style="display: inline-block; width:30%;">
                            <label for="book_cond" class="bmd-label-floating">Condition</label>
                                <select class="form-control" name="book_cond" id="book_cond">
                                    <option value="Any" default <?php echo (isset($_POST['book_cond']) && $_POST['book_cond'] === 'Any') ? 'selected' : ''; ?> >Any</option>
                                    <option value="New" <?php echo (isset($_POST['book_cond']) && $_POST['book_cond'] === 'New') ? 'selected' : ''; ?>>New</option>
                                    <option value="Like New" <?php echo (isset($_POST['book_cond']) && $_POST['book_cond'] === 'Like New') ? 'selected' : ''; ?>>Like New</option>
                                    <option value="Used" <?php echo (isset($_POST['book_cond']) && $_POST['book_cond'] === 'Used') ? 'selected' : ''; ?>>Used</option>
                                </select>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div>
                                <!-- region filter checkbox -->
                                <input type="checkbox" id="user_region" value="1" class="mdl-checkbox" name="user_region" <?php if(isset($_POST['user_region'])) echo "checked='checked'"; ?>>
                                <!-- <input type="hidden" id="user_region" value="0" class="mdl-checkbox" name="user_region"> -->
                                <label for="user_region">My Area Only</label>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary" style="width:35%; margin-bottom:15px; margin-right: 25px;">Apply Filters</button>
                        </div>
                        <br>
                        
                        <?php echo form_close(); ?>

                        
                    <!-- Table Books -->
                    <table class="table table-image" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col" id="availableBookImg">Image</th>
                                <th scope="col" id="availableBookTitle">Title</th>
                                <th scope="col" id="availableBookAuthor">Author</th>
                                <th scope="col" id="availableBookCond">Condition</th>
                                <th scope="col" id="availableBookGenre" data-visible="false" style="display: none;">Genre</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php foreach ($books as $book):
                        //Open a form that will send the book UID to the controller in order to show it's full details.
                                $attributes = array('id' => 'form_'.$book->UID, 'name' =>$book->UID);?>
                                <tr id="<?php echo '_'.$book->UID?>" class="table-row" onclick="submitit(this.id)">
                                    <td class="w-25">
                                        <!--Open the form -->
                                    <?php echo form_open('Books/single_book', $attributes); ?>
                                        <input type="hidden" value="<?php echo $book->UID;?>" name="b_UID" id="<?php echo $book->UID?>"> 
                                        <!-- OLD IMAGE <span class="img-fluid"> <?php echo '<img style="max-height:200px; max-width: 100%;" src="data:image/jpeg;base64,'.base64_encode( $book->img).'"/>';?> <br></span> -->
                                        <span class="img-fluid"> <img src="<?php echo base_url('images/user_uploads/'.$book->img_title);?>" alt="Book Photo" style="max-height:200px; max-width: 100%;"> <br></span>

                                        <button id="<?php echo 'submit_'.$book->UID;?>" class="mdl-button mdl-js-button mdl-button--icon hidden" type="submit" name="submit "><i class="material-icons">open_in_new</i></button>
                                    <?php echo form_close(); ?>
                                    </td>
                                    <td> <?php echo $book->title ?></td>
                                    <td> <?php echo $book->author ?></td>
                                    <td> <?php echo $book->cond ?></td>
                                    <td class="hidden" id="b_genre"> <?php echo $book->book_genre ?></td>
                                </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="">
                        <h5 class="">Can't find what you are looking for? <br>Try resetting your filters.</h5>
                    </div>
                       
                    <script>
                        $(document).ready(function(){
                            $("#myInput").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#myTable tr").filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            });

                            
                        function submitit(id)
                            {
                                var str1 = id;
                                var str2 = 'submit';
                                var res = str2.concat(str1);
                                // window.alert(res)
                                document.getElementById(res).click();
                                
                                };

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
    

    // $(document).ready(function($) {
    //     $(".table-row").click(function() {
    //         window.document.location = $(this).data("href");
    //     });
    // });

    // Filter by genre, condition, author

    var
        filters = {
            genre_f: null,
            language_f: null,
            condition_f: null
        };

    function updateFilters() {
        $('.task-list-row').hide().filter(function() {
            var
            self = $(this),
            result = true; // not guilty until proven guilty
            
            Object.keys(filters).forEach(function (filter) {
            if (filters[filter] && (filters[filter] != 'None') && (filters[filter] != 'Any')) {
                result = result && filters[filter] === self.data(filter);
            }
    });

        return result;
        }).show();
    }

    function changeFilter(filterName) {
        filters[filterName] = this.value;
        updateFilters();
    }

    // Book Genre Dropdown Filter
    $('#genre-filter').on('change', function() {
        changeFilter.call(this, 'genre_f');
    });

    // Language Dropdown Filter
    $('#language-filter').on('change', function() {
        changeFilter.call(this, 'language_f');
    });

    // Condition Dropdown Filter
    $('#condition-filter').on('change', function() {
        changeFilter.call(this, 'condition_f');
    });

    /*
    future use for a text input filter
    $('#search').on('click', function() {
        $('.box').hide().filter(function() {
            return $(this).data('order-number') == $('#search-criteria').val().trim();
        }).show();
    });*/

    </script>

