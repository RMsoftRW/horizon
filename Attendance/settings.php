<?php include 'includes/init.php' ; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>
<?php include 'includes/top_menu.php'; ?>

<!-- 
	MIDDLE 
-->
<section id="middle">


	<!-- page title -->
	<header id="page-header">
		<h1>EDIT SYSTEM SETTINGS</h1>
		<ol class="breadcrumb">
			<li><a href="scan.php">Scan</a></li>
			<li class="active">User registration</li>
		</ol>
	</header>
	<!-- /page title -->


	<div id="content" class="padding-20">
		<div class="row">
			<div class="col-md-12">
				<!-- Panel Tabs -->
				<div id="panel-ui-tan-l1" class="panel panel-default">

					<div class="panel-heading">

						<span class="elipsis"><!-- panel title -->
							<strong>PARAMETER</strong>
						</span>

						<!-- tabs nav -->
						<ul class="nav nav-tabs pull-right">
							<li class="active"><!-- TAB 1 -->
								<a href="#ttab1_nobg" data-toggle="tab" aria-expanded="true"> Time Management </a>
							</li>
							<li class=""><!-- TAB 2 -->
								<a href="#ttab2_nobg" data-toggle="tab" aria-expanded="false"> SITE MANAGEMENT</a>
							</li>
							<li class="">
								<a href="#ttab3_nobg" data-toggle="tab" aria-expanded="false"> POSITION MANAGEME</a>
							</li>
						</ul>
						<!-- /tabs nav -->

					</div>
					<!-- panel content -->
					<div class="panel-body">

							<!-- tabs content -->
							<div class="tab-content transparent">

								<div id="ttab1_nobg" class="tab-pane active padding-20"><!-- TAB 1 CONTENT -->
									<div class="row padding-20">
										<div class="col-md-5 col-sm-12">
											<h4>EVENT FORM</h4>
											<!-- <p>Please fill this form to create an event.</p> -->
											<form id="event_cr" method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
												<fieldset   id="pass_field">
													<div class="row">
														<div class="form-group">
															<div class="col-md-12 col-lg-12">
																<label for="time">Event Name <span class="text-danger">*</span></label>
																<input type="text" name="event_name" id="event_name" class="form-control required" placeholder="Enter event name, eg: Morning, Lunch, Evening...">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group">
															<div class="col-md-12 col-sm-12">
																<label for="time">Time <span class="text-danger">*</span></label>
																<input type="time" name="event_time" id="event_time" value="" class="form-control required" placeholder="Click here to select the event time">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group">
															<div class="col-md-12 col-sm-12">
																<button class="btn btn-info" name="create_ev">CREATE EVENT</button>
															</div>
														</div>
													</div>
												</fieldset>
											</form>
										</div>
										<div class="col-md-7">
											<h4>EDIT EVENTS</h4>
											<p>Events created can be always edited, click on the edit button to edit time <br> and event name.</p>
											<div class="table-responsive">
												<table class="table table-hover table-bordered nomargin">
													<tbody>
														<tr>
															<td> Morning - Time </td>
															<td>MUSEME</td>
															<td><span class="label label-success" data-toggle="modal" data-target="#MyEvent">Edit time and event </span></td>
														</tr>
														<tr>
															<td>Lunch - Time </td>
															<td>Amudala</td>
															<td><span class="label label-success" data-toggle="modal" data-target="#MyEvent">Edit time and event </span></td>
														</tr>
														<tr>
															<td>Evening - Time</td>
															<td>1 1990 1324 2435 1 2345</td>
															<td><span class="label label-success" data-toggle="modal" data-target="#MyEvent">Edit time and event </span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div><!-- /TAB 1 CONTENT -->

								<div id="ttab2_nobg" class="tab-pane padding-20" ><!-- TAB 2 CONTENT -->
									<div class="row padding-20">
										<div class="col-md-5 col-sm-12">
											<h4>SITE FORM</h4>
											<p>Please fill this form to create a site.</p>
											<form id="site_cr" method="post" action="#">
												<fieldset   id="pass_field">
													<div class="row">
														<div class="form-group">
															<div class="col-md-12 col-lg-12">
																<label for="time">Site Name <span class="text-danger">*</span></label>
																<input type="text" name="site_name" id="site_name" class="form-control required" placeholder="Enter a site name here">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group">
															<div class="col-md-12 col-sm-12">
																<button class="btn btn-info">CREATE SITE</button>
															</div>
														</div>
													</div>
												</fieldset>
											</form>
										</div>
										<div class="col-md-7">
											<h4>EDIT SITE</h4>
											<p>Sites created can be always edited, click on the edit button to edit time <br> and event name.</p>
											<div class="table-responsive">
												<table class="table table-hover table-bordered nomargin">
													<tbody>
														<tr>		
															<td>MUSEME</td>
															<td><span class="label label-success" data-toggle="modal" data-target="#Mysite">Edit Site  </span></td>
														</tr>
														<tr>
															<td>Amudala</td>
															<td><span class="label label-success" data-toggle="modal" data-target="#Mysite">Edit Site  </span></td>
														</tr>
														<tr>

															<td>1 1990 1324 2435 1 2345</td>
															<td><span class="label label-success" data-toggle="modal" data-target="#Mysite">Edit Site </span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div><!-- /TAB 3 CONTENT -->

								<div id="ttab3_nobg" class="tab-pane padding-20"><!-- TAB 3 CONTENT -->
									<div class="row padding-20">
										<div class="col-md-5 col-sm-12">
											<h4>POSITION FORM</h4>
											<p>Please fill this form to create a position.</p>
											<form id="pos_cr" method="post" action="#">
												<fieldset   id="pass_field">
													<div class="row">
														<div class="form-group">
															<div class="col-md-12 col-lg-12">
																<label for="pos">Position Name <span class="text-danger">*</span></label>
																<input type="text" name="pos_name" id="pos_name" class="form-control required" placeholder="Enter a position here">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group">
															<div class="col-md-12 col-sm-12">
																<button class="btn btn-info">CREATE POSITION</button>
															</div>
														</div>
													</div>
												</fieldset>
											</form>
										</div>
										<div class="col-md-7">
											<h4>EDIT POSITION</h4>
											<p>Position created can be always edited, click on the edit button to edit position <br> </p>
											<div class="table-responsive">
												<table class="table table-hover table-bordered nomargin">	
													<tbody>
														<tr>
															<td>Officer</td>
															<td><span class="label label-success" data-toggle="modal" data-target="#Myposition">Edit Position </span></td>
														</tr>
														<tr>
															<td>Manager</td>
															<td><span class="label label-success" data-toggle="modal" data-target="#Myposition">Edit Position </span></td>
														</tr>
														<tr>
															<td>Supervisor</td>
															<td><span class="label label-success" data-toggle="modal" data-target="#Myposition">Edit Position </span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div><!-- /TAB 3 CONTENT -->
							<!-- /tabs content -->

					</div>
					<!-- /panel content -->

				</div>
				<!-- /Panel Tabs -->
			</div>
		</div>

	</div>
</section>
<!-- /MIDDLE -->

</div>



<!-- MODEL EVENT -->

<div id="MyEvent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">TIME AND EVENT</h4>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
			
				<div class="panel-body">

			<form id="event_ed" method="post" action="#">
				<fieldset>
					<div class="row">
						<div class="form-group">
							<div class="col-md-6 col-sm-6">
								<label>EVENT <span class="text-danger">*</span></label>
								<input type="text" name="event_name_ed" id="event_name_ed" class="form-control required">
							</div>
							<div class="col-md-6 col-sm-6">
								<label>TIME <span class="text-danger">*</span></label>
								<input type="text" name="event_time_ed" id="event_time_ed" class="form-control required">
							</div>
						</div>
					</div>
				</fieldset>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-3d btn-teal btn-block margin-top-30">
							EDIT EVENT
						</button>
					</div>
				</div>
			</form>
	</div>

</div>

		<!-- Modal Footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
		</div>

	</div>
</div>
</div>




<!-- MODEL SITE -->

<div id="Mysite" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">EDIT SITE</h4>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
			
				<div class="panel-body">

			<form id="site_ed" method="post" action="includes/validation.php">
				<fieldset>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12 col-sm-12">
								<label>SITE <span class="text-danger">*</span></label>
								<input type="text" name="site_name_ed" id="site_name_ed" class="form-control required">
							</div>
						</div>
					</div>
				</fieldset>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-3d btn-teal btn-block margin-top-30">
							EDIT SITE
						</button>
					</div>
				</div>
			</form>
	</div>
</div>
		<!-- Modal Footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
		</div>

	</div>
</div>
</div>

<!-- MODEL SITE  -->

<div id="Myposition" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">EDIT POSITION</h4>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
			
				<div class="panel-body">

			<form id="pos_ed" method="post" action="includes/validation.php">
				<fieldset>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12 col-sm-12">
								<label>POSITION <span class="text-danger">*</span></label>
								<input type="text" name="pos_edited" id="pos_edited" class="form-control required">
							</div>
						</div>
					</div>
				</fieldset>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-3d btn-teal btn-block margin-top-30">
							EDIT POSITION
						</button>
					</div>
				</div>
			</form>
	</div>
</div>
		<!-- Modal Footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
		</div>

	</div>
</div>
</div>
	
<?php include 'includes/footer.php'; ?>
