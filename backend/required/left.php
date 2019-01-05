		<aside id="left-panel">
			<div class="login-info">
				<span>
					<a href="profile.php">
						<img src="assets/img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							<?php echo $user->fname;?> <?php echo $user->lname;?> 
						</span>
					</a> 
				</span>
			</div>
			<nav>
				<ul>
					<li>
						<a href="index.php" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Overview</span></a>
					</li>
					<li>
						<a href="equipments.php"><i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">Equipments</span></a>
					</li>
					<li>
						<a href="users.php"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent">Users</span></a>
					</li>
				</ul>
			</nav>
			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>
		</aside>
