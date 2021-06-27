<div class="main-container" id="container">
	<div class="overlay"></div>
	<div class="search-overlay"></div>
	<!--  BEGIN SIDEBAR  -->
	<div class="sidebar-wrapper sidebar-theme">
		<nav id="sidebar">
			<div class="profile-info">
				<figure class="user-cover-image"></figure>
				<div class="user-info">
					<img src="<?= base_url() ?>assets/img/90x90.jpg" alt="avatar">
					<?php $profile = getProfile($this->session->userdata('user_id')) ?>
					<h6 class=""><?= $profile['name'] ?></h6>
					<p class=""><?= $profile['role_name'] ?></p>
				</div>
			</div>
			<div class="shadow-bottom"></div>
			<ul class="list-unstyled menu-categories" id="accordionExample">
				<li class="menu active">
					<a href="<?= site_url('Dashboard') ?>" aria-expanded="true" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
								<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
								<polyline points="9 22 9 12 15 12 15 22"></polyline>
							</svg>
							<span>Dashboard</span>
						</div>
					</a>
				</li>

				<?php
				$menu = get_menu($this->session->userdata('role'));
				for ($i = 0; $i < count($menu); $i++) : ?>
					<li class="menu">
						<a href="#<?= $menu[$i]['id'] ?>" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
							<div class="">
								<?= $menu[$i]['icon'] ?>
								<span><?= $menu[$i]['head_name'] ?></span>
							</div>
							<div>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
									<polyline points="9 18 15 12 9 6"></polyline>
								</svg>
							</div>
						</a>
						<ul class="collapse submenu list-unstyled" id="<?= $menu[$i]['id'] ?>" data-parent="#accordionExample">
							<?php $submenu = $menu[$i]['menu_item'];
							for ($y = 0; $y < count($submenu); $y++) : ?>
								<li>
									<a href="<?= site_url($submenu[$y]['url']) ?>"> <?= $submenu[$y]['tcode'] . '-' . $submenu[$y]['menu_name'] ?> </a>
								</li>
							<?php endfor ?>
						</ul>
					</li>
				<?php endfor ?>
			</ul>
		</nav>

	</div>
	<!--  END SIDEBAR  -->