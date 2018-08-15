<?php include 'includes/init.php'; ?>
<?php include 'includes/validation.php'; ?>
<?php include 'includes/addnewuser.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>
<?php include 'includes/top_menu.php'; ?>

			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>USER REGISTRATION</h1>
					<ol class="breadcrumb">
						<li><a href="scan.php">Scan</a></li>
						<li class="active">User registration</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="row">
						<div class="col-md-12"><?php echo($msg); ?></div>
						<div class="col-md-6">
						
							<!-- ------ -->
							<div class="panel panel-default">
								<div class="panel-heading panel-heading-transparent">
									<strong>User Registration form</strong>
								</div>

								<div class="panel-body">

										<form id="add_user" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" >
											<fieldset>
												<!-- required [php action request] -->
												<!-- <input type="hidden" name="action" value="contact_send" /> -->

												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>First Name <span class="text-danger">*</span></label>
															<input type="text" name="user_fname" value="" class="form-control required" value="">
														</div>
														<div class="col-md-6 col-sm-6">
															<label>Last Name <span class="text-danger">*</span></label>
															<input type="text" name="user_lname" value="" class="form-control required">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Other name </label>
															<input type="text" name="o_name" id="o_name" value="" class="form-control ">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Gender <span class="text-danger">*</span></label>
															<select name="user_gn" id="user_gn" class="form-control pointer required">
																<option value="">--- Select Gender---</option>
																<?php GetV('gnd'); ?>
															</select>
														</div>
														<div class="col-md-6 col-sm-6">
															<label>Position <span class="text-danger">*</span></label>
															<select name="user_post" id="user_pos" class="form-control pointer required">
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
															<input type="text" name="id_num" id="id_num" value="" class="form-control nbrs required">
															<span id="id_message"></span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Phone Number <span class="text-danger">*</span></label>
															<input type="text" name="user_phone" id="user_phone" value="" class="form-control nbrs required">
															<span id="p_message"></span>
															
														</div>
														<div class="col-md-6 col-sm-6">
															<label>Address <span class="text-danger">*</span></label>
															<select name="user_add" id="user_add" class="form-control pointer required">
																<option value="">--- Select Address---</option>
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
																<input type="file" class="form-control"  onchange="jQuery(this).next('input').val(this.value);" name="user_pic1">
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
															<input type="password" name="user_pass" id="user_pass" value="" class="form-control ">
															
														</div>
														<div class="col-md-6 col-sm-6">
															<label>Repeat Password <span class="text-danger">*</span></label>
															<input type="password" name="user_pass_rep" id="user_pass_rep" value="" onkeyup="check()" class="form-control ">
														</div>
													</div>
												</div>
												<div class="row" style="margin-bottom: 0px;padding-top: 10px;">
													<div class="col-md-12" id="message_pass" style="margin-bottom: -20px">
															
													</div>
												</div>
											</fieldset>

											<div class="row">
												<div class="col-md-12">
													<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30" name="newusr">
														CREATE USER
													</button>
												</div>
											</div>

										</form>

								</div>

							</div>
							<!-- /----- -->

						</div>

						<div class="col-md-6">

							<div class="panel panel-default">
								<div class="panel-body">

									<h4>How it's working?</h4>
									<p>To register a user successfuly, you must fill all the field with a red star, after the registration you will receive a successful registration message to make sure the registration has been completed successfully.</p>
									<hr />
									<h4>Edit a user</h4>
									<p>
										If you want to edit a user please click on this button <br><br>
										<a href="edit-user.php"  class="btn btn-info btn-xs">Edit user</a>
									</p>

								</div>
							</div>

						</div>

					</div>

				</div>
			</section>
			<!-- /MIDDLE -->

		</div>
<?php include 'includes/footer.php'; ?>
	
