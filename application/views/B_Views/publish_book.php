<div class="panel deep-purple"></div>
	<main class="freeBird">
		<div class="container">
			<div class="row">
				<div class="col-md-7 m-x-auto pull-xs-none">
					<div class="jumbotron">
						<h2 class="h2-responsive"><strong>Material Design Form</strong></h2>
						<p>Example of Material Design Form</p>
						<!-- <hr class="m-y-2"> -->

						<!--Naked Form-->
						<div class="card-block">

							<!--Body-->
							<form action="#">

								<h5 class="h5-responsive">Basic Textbox</h5>
								<!-- Basic textbox -->
								<div class="md-form">
									<input type="text" id="form1" class="form-control">
									<label for="form1" class="">Example label</label>
								</div>
								<!-- /.Basic textbox -->

								<h5 class="h5-responsive">Textbox with icon</h5>
								<div class="md-form">
									<i class="fa fa-user prefix"></i>
									<input type="text" id="form2" class="form-control">
									<label for="form2">Your name</label>
								</div>

								<!--Email validation-->
								<h5 class="h5-responsive">E-mail validation</h5>
								<div class="md-form">
									<i class="fa fa-envelope prefix"></i>
									<input type="email" id="form9" class="form-control validate">
									<label for="form9" data-error="wrong" data-success="right">Your email</label>
								</div>

								<!--Textarea with icon-->
								<h5 class="h5-responsive">Textarea</h5>
								<div class="md-form">
									 <i class="fa fa-pencil prefix"></i>
									<textarea type="text" id="form7" class="md-textarea"></textarea>
									<label for="form7">Textarea</label>
								</div>

								<h5 class="h5-responsive">Disabled field</h5>
								<div class="md-form">
									<input type="text" id="form11" class="form-control" disabled>
									<label for="form11" class="disabled">Example label</label>
								</div>

								<div class="text-xs-left">
									<button class="btn btn-primary">Submit</button>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>

    