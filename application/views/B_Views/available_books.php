        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
                <!-- Books table Start -->
                    <h2 class="pad5">Available Books</h2>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for the book or author name..." title="Type in a name">
                    <br>
                    <!-- Table Filters -->
                    <div class="container">
                        <div class="row">
                            <table class="table">
                                <thead>
                                <tr class="filters">
                                    <th>Assigned User
                                    <select id="assigned-user-filter" class="form-control">
                                        <option>None</option>
                                        <option>John</option>
                                        <option>Rob</option>
                                        <option>Larry</option>
                                        <option>Donald</option>
                                        <option>Roger</option>
                                    </select>
                                    </th>
                                    <th>Status
                                    <select id="status-filter" class="form-control">
                                        <option>Any</option>
                                        <option>Not Started</option>
                                        <option>In Progress</option>
                                        <option>Completed</option>
                                    </select>
                                    </th>
                                    <th>Milestone
                                    <select id="milestone-filter" class="form-control">
                                        <option>None</option>
                                        <option>Milestone 1</option>
                                        <option>Milestone 2</option>
                                        <option>Milestone 3</option>
                                    </select>
                                    </th>
                                    <th>Priority
                                    <select id="priority-filter" class="form-control">
                                        <option>Any</option>
                                        <option>Low</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                        <option>Urgent</option>
                                    </select>
                                    </th>
                                    <th>Tags
                                    <select id="tags-filter" class="form-control">
                                        <option>None</option>
                                        <option>Tag 1</option>
                                        <option>Tag 2</option>
                                        <option>Tag 3</option>
                                    </select>
                                    </th>
                                </tr>
                                </thead>
                            </table>

                    <!-- Table Books -->
                    <table class="table table-image" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col" id="availableBookImg">Image</th>
                                <th scope="col" id="availableBookTitle">Title</th>
                                <th scope="col" id="availableBookAuthor">Author</th>
                                <th scope="col" id="availableBookCond">Condition</th>
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
                                </tr>
                        <?php endforeach; ?>
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
            user: null,
            status: null,
            milestone: null,
            priority: null,
            tags: null
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

    // Assigned User Dropdown Filter
    $('#assigned-user-filter').on('change', function() {
        changeFilter.call(this, 'user');
    });

    // Task Status Dropdown Filter
    $('#status-filter').on('change', function() {
        changeFilter.call(this, 'status');
    });

    // Task Milestone Dropdown Filter
    $('#milestone-filter').on('change', function() {
        changeFilter.call(this, 'milestone');
    });

    // Task Priority Dropdown Filter
    $('#priority-filter').on('change', function() {
        changeFilter.call(this, 'priority');
    });

    // Task Tags Dropdown Filter
    $('#tags-filter').on('change', function() {
        changeFilter.call(this, 'tags');
    });

    /*
    future use for a text input filter
    $('#search').on('click', function() {
        $('.box').hide().filter(function() {
            return $(this).data('order-number') == $('#search-criteria').val().trim();
        }).show();
    });*/

    </script>

