<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>		
<?php include 'includes/top_menu.php'; ?>
<?php $_SESSION['page'] = 'u_logs'; ?>		

			<!-- 
				MIDDLE 
			-->
			<section id="middle" class="userLogs" style="margin-left: 0px; ">
				<!-- page title -->
				<header id="page-header">
					<h1><?php  //$name = GetUserInfo($_GET['me']); //echo($name['fname']); ?></h1> 
					<!-- <button id="ok">click</button> -->
					<ol class="breadcrumb">
						<!-- <li><a class="text-muted" href="scan.php">Scan</a></li> -->
					</ol>
				</header>
				<!-- /page title -->

				<div id="content" class="padding-20" style="">

					<!-- <div id="edit" class="tab-pane"> -->
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="f_attend" class="form-horizontal" method="get" style="margin-bottom: 0">
							<fieldset>
								<div class="form-group">
									<div class="col-md-4">
										<!-- <input type="text" class="form-control required" id="s_attend" placeholder="SEARCH BY NANE"> -->
									</div>
									<div class="col-md-3 col-sx-6">
										<input type="hidden" name="me" value="<?php echo($_GET['me']);?>">
										<input type="text" class="form-control datepicker" id="from" data-format="yyyy-mm-dd" data-lang="en" data-rtl="false" placeholder="DATE FROM ... " autocomplete="off" value="<?php echo($_GET['from']); ?>" name="from">
									</div>
									<div class="col-md-3 col-sx-6">
										<input type="text" class="form-control datepicker" id="to" data-format="yyyy-mm-dd" data-lang="en" data-rtl="false" placeholder="DATE To ... " autocomplete="off" value="<?php echo($_GET['to']); ?>" name="to">
									</div>
									<div class="col-md-2">
										<button class="btn btn-3d btn-reveal btn-yellow btn-light">SEARCH NOW</button>
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
											<th>#</th>
											<th>Names</th>
											<th>ID Number</th>
											<th>Site</th>
											<th>Date and Time</th>
											<th>Check In</th>
											<th>Check Out</th>
										</tr>
									</thead>
									<tbody>
									<?php include 'includes/processing.php'; ?>
										
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

<!-- <script type="text/javascript">
		 	$(document).ready(function(){
		 	$('#ok').on("click", function(){
		 		window.open('http://localhost/attendance1/user_logs.php','GoogleWindow', 'width=800, height=600');
		 	});
		 });	
		 </script> -->