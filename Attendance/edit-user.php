<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>
<?php include 'includes/top_menu.php'; ?>
<?php $_SESSION['page'] = 'edit'; ?>
			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>USER MANAGER</h1>
					<ol class="breadcrumb">
						<li><a href="scan.php">Scan</a></li>
						<li class="active">All users</li>
					</ol>
				</header>
				<!-- /page title -->

				<div id="content" class="padding-20">


					


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
							<?php //echo($_SESSION['editable_u']); ?>
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

<?php include 'includes/edit_user_modal.php'; ?>
<?php include 'includes/footer.php'; ?>
