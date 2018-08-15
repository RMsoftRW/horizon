<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog">
	<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Edit user</h4>
		</div>

		<!-- Modal Body -->
		<div class="modal-body">
		
			<div class="panel-body">

		<form id="ed_user" method="post" action="includes/validation.php" enctype="multipart/form-data" >
			<fieldset>
				<!-- required [php action request] -->
				<input type="hidden" name="action" value="contact_send" />

				<div class="row">
					<div class="form-group">
						<div class="col-md-6 col-sm-6">
							<?php //echo($_SESSION['editable_u']); ?>
							<label>First Name <span class="text-danger">*</span></label>
							<input type="text" name="user_fname" value="" class="form-control required">
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
								<input type="file" class="form-control"  onchange="jQuery(this).next('input').val(this.value);">
								<input type="text" class="form-control required" id="user_pic" name="user_pic" placeholder="no file selected" readonly="">
								<span class="button">Choose File</span>
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
							<input type="text" name="user_pass_rep" id="user_pass_rep" onkeyup="check()" value="" class="form-control ">
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
					<button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
						SAVE CHANGES
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
