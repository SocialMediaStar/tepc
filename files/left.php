		<!-- #NAVIGATION -->
		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="assets/img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							<?php echo $user->fname." ".$user->lname;?>
						</span>
						<i class="fa fa-angle-down"></i>
					</a> 
					
				</span>
			</div>
			<!-- end user info -->

			<nav>
				<!-- 
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				<ul>
					<li>
						<a href="index.php"><i class="fa fa-desktop"></i> Dashboard</a>
					</li>
					<li>
						<a href="users.php"><i class="fa fa-user"></i> Users</a>
					</li>
					<li>
						<a href="equipments.php"><i class="fa fa-barcode"></i> Equipments</a>
					</li>
					<li>
						<a href="settings.php"><i class="fa fa-cogs"></i> Settings</a>
					</li>
				</ul>
			</nav>
			

			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
		<!-- END NAVIGATION -->
