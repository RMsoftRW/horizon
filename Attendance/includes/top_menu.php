<!-- HEADER -->
			<header id="header">

				<!-- Mobile Button -->
				<button id="mobileMenuBtn"></button>

				<!-- Logo -->
				<span class="logo pull-left" style="padding-top: 7px;">
					<img src="assets/images/attendance.png" alt="admin panel" height="35" />
					<!-- <h3>ATTENDANCE</h3> -->
				</span>

				<nav>

					<!-- OPTIONS LIST -->
					<ul class="nav pull-right">

						<!-- USER OPTIONS -->
						<li class="dropdown pull-left">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<?php headImg($_SESSION['authId']); ?>
								
								<span class="user-name">
									<span class="hidden-xs">
										<?php headNames($_SESSION['authId']); ?> <i class="fa fa-angle-down"></i>
									</span>
								</span>
							</a>
							<ul class="dropdown-menu hold-on-click">
								<li><!-- settings -->
									<a href="user-profile.php"><i class="fa fa-user"></i> User Profile</a>
								</li>
								<li><!-- settings -->
									<a href="settings.php"><i class="fa fa-cogs"></i> Settings</a>
								</li>

								<li class="divider"></li>
								<li><!-- logout -->
									<a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
						<!-- /USER OPTIONS -->

					</ul>
					<!-- /OPTIONS LIST -->

				</nav>

			</header>
			<!-- /HEADER -->
