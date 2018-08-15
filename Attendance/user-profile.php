<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>
<?php include 'includes/top_menu.php'; ?>
<?php $_SESSION['page'] = 'prof'; ?>
<?php include 'includes/scan.php'; ?>
			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>USER PROFILE</h1>
					<ol class="breadcrumb">
						<li><a href="scan.php">Scan</a></li>
						<li class="active">User management</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="page-profile">

						<div class="row">

							<!-- COL 1 -->
							<div class="col-md-4 col-lg-3">
								<section class="panel">
									<div class="panel-body noradius padding-10">

										<figure class="margin-bottom-10"><!-- image -->
											<?php GetImg(); ?>
										</figure><!-- /image -->

									</div>
								</section>
							</div><!-- /COL 1 -->

							<!-- COL 2 -->
							<div class="col-md-8 col-lg-9">

								<div class="tabs white nomargin-top">
									<ul class="nav nav-tabs tabs-primary">
										<li class="active">
											<a href="#overview" data-toggle="tab">USER DETAILS</a>
										</li>
										<li>
											<a href="#edit" data-toggle="tab">EDIT USER DEATILS</a>
										</li>
									</ul>

									<div class="tab-content">

										<!-- Overview -->
										<div id="overview" class="tab-pane active">

											<div class="table-responsive">
										<table class="table table-hover nomargin">
											<tbody>
												<tr>
													<td> <strong>First Name : </strong></td>
													<td><?php echo($fname); ?></td>
												</tr>
												<tr>
													<td><strong>Last Name : </strong></td>
													<td><?php echo($lname); ?></td>
												</tr>
												<tr>
													<td><strong> ID Number  : </strong></td>
													<td><?php echo($idnum); ?></td>
												</tr>
												<tr>
													<td><strong>Address : </strong></td>
													<td><?php echo($addre); ?></td>
												</tr>
												<tr>
													<td><strong>Phone number : </strong></td>
													<td><?php echo($phone); ?></td>
												</tr>
												<tr>
													<td><strong>Email : </strong></td>
													<td><?php echo($email); ?></td>
												</tr>
												<tr>
													<td><strong>User Role : </strong></td>
													<td><?php echo($role); ?></td>
												</tr>
												<tr>
													<td><strong>Site : </strong></td>
													<td><?php echo($site); ?></td>
												</tr>
											</tbody>
										</table>
									</div>
											
											
										</div>

										<!-- Edit -->
										<div id="edit" class="tab-pane">
											<form class="validate" method="post" action="includes/validation.php" enctype="multipart/form-data" >
											<fieldset>
												<!-- required [php action request] -->
												<input type="hidden" name="action" value="contact_send" />

												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>First Name <span class="text-danger">*</span></label>
															<input type="text" name="user_fname" value="<?php echo($fname); ?>" class="form-control required">
														</div>
														<div class="col-md-6 col-sm-6">
															<label>Last Name <span class="text-danger">*</span></label>
															<input type="text" name="user_lname" value="<?php echo($lname); ?>" class="form-control required">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Other name </label>
															<input type="text" name="o_name" id="o_name" value="<?php echo($mname); ?>" class="form-control ">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Gender <span class="text-danger">*</span></label>
															<select name="user_role" id="user_gn" class="form-control pointer required">
																<option value="">--- Select Gender---</option>
																<?php GetV('gnd'); ?>
															</select>
														</div>
														<div class="col-md-6 col-sm-6">
															<label>Position <span class="text-danger">*</span></label>
															<select name="user_status" id="user_pos" class="form-control pointer required">
																<option value="">--- Select Position---</option>
																<?php GetV('pos'); ?>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>ID Number <span class="text-danger">*</span></label>
															<input type="text" name="id_num" id="id_num" value="<?php echo($idnum); ?>" class="form-control required">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Phone Number <span class="text-danger">*</span></label>
															<input type="text" name="user_phone" id="user_phone" value="<?php echo($phone); ?>" class="form-control required">
															
														</div>
														<div class="col-md-6 col-sm-6">
															<label>Address <span class="text-danger">*</span></label>
															<select name="user_add" id="user_add" class="form-control pointer required">
																<option value="">--- Select Position---</option>
																<?php GetV('distr'); ?>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Picture <span class="text-danger">*</span></label>
															<div class="fancy-file-upload fancy-file-info">
																<i class="fa fa-upload"></i>
																<input type="file" class="form-control required"  onchange="jQuery(this).next('input').val(this.value);">
																<input type="text" class="form-control required" id="user_pic" name="user_pic" placeholder="no file selected" readonly="">
																<span class="button">Choose Picture</span>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>User Site <span class="text-danger">*</span></label>
															<select name="user_site" id="user_site" class="form-control pointer required">
																<option value="">--- Select site---</option>
																<?php GetV('sites'); ?>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-6">
															<label>User Role <span class="text-danger">*</span></label>
															<select name="user_role" id="user_role" onchange="show_form()" class="form-control pointer required">
																<option value="">--- Select role---</option>
																<?php GetV('roles'); ?>
															</select>
														</div>
													</div>
												</div>
												
											</fieldset>
											<fieldset  style="display: none; margin-top: 40px" id="pass_field">
												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Username <span class="text-danger">*</span></label>
															<input type="text" name="username" id="username" class="form-control ">
														</div>
														<div class="col-md-6 col-sm-6">
															<label>Email <span class="text-danger">*</span></label>
															<input type="email" name="email" id="email" class="form-control required">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Password <span class="text-danger">*</span></label>
															<input type="text" name="user_pass" id="user_pass" value="" class="form-control ">
															
														</div>
														<div class="col-md-6 col-sm-6">
															<label>Repeat Password <span class="text-danger">*</span></label>
															<input type="text" name="user_pass_rep" id="user_pass_rep" value="" class="form-control ">
														</div>
													</div>
												</div>
											</fieldset>
											<div class="row">
												<div class="col-md-12">
													<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
														SAVE CHANGES
													</button>
												</div>
											</div>
										</form>
										</div>
									</div>
								</div>
							</div><!-- /COL 2 -->
						</div>

					</div>

				</div>
			</section>
			<!-- /MIDDLE -->

		</div>
	
<?php include 'includes/footer.php'; ?>
	