<?php include 'includes/init.php'; ?>
<?php $_SESSION['page'] = 'scan'; ?>
<?php include 'includes/scan.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>
<?php include 'includes/top_menu.php'; ?>
			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>ATTENDANCE</h1>
					<ol class="breadcrumb"><!-- 
						<li><a href="home.php">All projects</a></li> -->
						<li class="active">Attendance</li> 
					</ol>
				</header>
				<!-- /page title -->

				<div id="content" class="padding-20">

					<!-- <div id="edit" class="tab-pane"> -->
						<form id="codeform" class="form-horizontal" method="POST" style="margin-bottom: 0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<fieldset>
								<div class="form-group">
									<div class="col-md-8">
										<input type="text" class="form-control required" id="scodes" placeholder="ENTER BARCODE HERE" autocomplete="off" name="scodes">
									</div>
									<!-- <div class="col-md-1">
										<input type="checkbox" value="c_in" class="form-control" id="c_in" name="c_in[]" checked="true">
									</div>
									<div class="col-md-1">
										<input type="checkbox" value="c_out" class="form-control" id="c_out" name="c_in[]">
									</div> -->
									<div class="col-md-2">
										<button class="btn btn-3d btn-reveal btn-yellow btn-light">ATTEND NOW</button>
									</a>
									</div>
								</div>
							</fieldset>
						</form>
					<!-- </div>	 -->

					<div id="panel-5" class="panel panel-default" style="padding-top: 5px">

						<!-- panel content -->
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4 col-lg-4">
								    <?php GetImg(); ?>
							    </div>
								<div class="col-md-4 col-lg-8">
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
													<td><strong>Position : </strong></td>
													<td><?php echo($posit); ?></td>
												</tr>
											</tbody>
										</table>
									</div>				
							    </div>
							   <!--  <div class="col-md-4 col-lg-3">
							    	 <img class="img img-responsive" src="assets/images/ok.png" width="320"  alt="avatar" />
							    </div> -->
							</div>

						</div>
						<!-- /panel content -->

						<!-- panel footer -->
						<div class="panel-footer">


						</div>
						<!-- /panel footer -->

					</div>
					<!-- /PANEL -->	


					<!-- 
						PANEL CLASSES:
							panel-default
							panel-danger
							panel-warning
							panel-info
							panel-success

						INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
								All pannels should have an unique ID or the panel collapse status will not be stored!
					-->
					<div id="panel-1" class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>SEARCH BY NAME, PHONE NUMBER </strong> <!-- panel title -->
							</span>

							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
								
							</ul>
							<!-- /right options -->

						</div>

						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover" id="datatable_sample">
								<thead >
									<tr> 
										<th class="table-checkbox">
											<input type="checkbox" class="group-checkable" data-set="#datatable_sample .checkboxes"/>
										</th>
										<th>Picture</th>
										<th>Full Names</th>
										<th>Phone Number</th>
										<th>Position</th>
										<th>Attendance</th>
									</tr>
								</thead>

								<tbody>
									<?php include 'getD.php'; ?>									
								</tbody>
							</table>

						</div>
						<!-- /panel content -->

						<!-- panel footer -->
						<div class="panel-footer">

						</div>
						<!-- /panel footer -->

					</div>
					<!-- /PANEL -->

				</div>
			</section>
			<!-- /MIDDLE -->

		</div>

<?php include 'includes/footer.php'; ?>
	