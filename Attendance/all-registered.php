<?php include 'includes/init.php'; ?>
<?php $_SESSION['page'] = 'a_logs'; ?>	
<?php include 'includes/header.php'; ?>		
<?php include 'includes/nav.php'; ?>	
<?php include 'includes/top_menu.php'; ?>		

			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>ATTENDANCE LIST</h1>
					<ol class="breadcrumb">
						<li><a href="scan.php">Scan</a></li>
					</ol>
				</header>
				<!-- /page title -->

				<div id="content" class="padding-20" style="">

					<!-- <div id="edit" class="tab-pane"> -->
						<form id="f_attend" class="form-horizontal" method="POST" style="margin-bottom: 0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<fieldset>
								<div class="form-group">
									<div class="col-md-6" style="padding-right: 0px;">
										<input type="text" class="form-control " id="s_attend" placeholder="SEARCH BY NANE" name="r_d_name">
									</div>
									<div class="col-md-2" style="padding-right: 0px;">
										<!-- <input type="text" class="form-control" id="profileLastName" placeholder="DATE FROM"> -->
										<input type="text" class="form-control datepicker" id="from" data-format="yyyy-mm-dd" data-lang="en" data-rtl="false" placeholder=" FROM ... " autocomplete="off" name="r_d_from">
									</div>
									<div class="col-md-2" style="padding-right: 0px;">
										<!-- <input type="text" class="form-control" id="profileLastName" placeholder=" To "> -->
										<input type="text" class="form-control datepicker" id="to" data-format="yyyy-mm-dd" data-lang="en" data-rtl="false" placeholder=" To ... " autocomplete="off" name="r_d_to">
									</div>
									<div class="col-md-2">
										<button class="btn btn-3d btn-reveal btn-yellow btn-light" name="s_rep">SEARCH NOW</button>
										<span></span>
									</a>
									</div>
								</div>
							</fieldset>
						</form>
					<!-- </div>	 -->

					<div id="panel-5" class="panel panel-default" style="padding-top: 5px">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>ATTENDANCE LIST</strong> <!-- panel title -->
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

							<div class="table-responsive nomargin">
								<table class="table table-bordered table-striped table-vertical-middle">
									<thead>
										<tr>
											<th>No</th>
											<th>Names</th>
											<th>ID Number</th>
											<th>Position</th>
											<th>Site</th>
											<th>Phone Number</th>
											<th>Date</th>
											<th>Logs</th>
										</tr>
									</thead>
									<tbody>
										<?php include 'includes/processing.php'; ?>
										<!-- <?php hit(); ?> -->
										<!-- <tr>
											<td class="text-center">2</td>
											<td>MUSEME Amudala Eric</td>
											<td>1 2435 6276 3637</td>
											<td>Officer</td>
											<td>Yeah yeah</td>
											<td>0788263032</td>

											<td><span class="label label-danger">Didn't Attend </span></td>
										</tr>
										<tr>
											<td class="text-center">3</td>
											<td>MUSEME Amudala Eric</td>
											<td>1 2435 6276 3637</td>
											<td>Officer</td>
											<td>Yeah yeah</td>
											<td>0788263032</td>
											<td><span class="label label-danger">Didn't Attend </span></td>
										</tr>
										<tr>
											<td class="text-center">1</td>
											<td>MUSEME Amudala Eric</td>
											<td>1 2435 6276 3637</td>
											<td>Officer</td>
											<td>Yeah yeah</td>
											<td>0788263032</td>
											<td><span class="label label-success">Attended </span></td>
										</tr>
										<tr>
											<td class="text-center">2</td>
											<td>MUSEME Amudala Eric</td>
											<td>1 2435 6276 3637</td>
											<td>Officer</td>
											<td>Yeah yeah</td>
											<td>0788263032</td>

											<td><span class="label label-danger">Didn't Attend </span></td>
										</tr>
										<tr>
											<td class="text-center">3</td>
											<td>MUSEME Amudala Eric</td>
											<td>1 2435 6276 3637</td>
											<td>Officer</td>
											<td>Yeah yeah</td>
											<td>0788263032</td>
											<td><span class="label label-danger">Didn't Attend </span></td>
										</tr> -->
									</tbody>
								</table>
							</div>


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
