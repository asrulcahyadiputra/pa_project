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
					<h6 class="">Andi Kohar</h6>
					<p class="">Project Leader</p>
				</div>
			</div>
			<div class="shadow-bottom"></div>
			<ul class="list-unstyled menu-categories" id="accordionExample">
				<li class="menu active">
					<a href="#dashboard" aria-expanded="true" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
								<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
								<polyline points="9 22 9 12 15 12 15 22"></polyline>
							</svg>
							<span>Dashboard</span>
						</div>
					</a>
				</li>

				<li class="menu md-visible menu-heading">
					<div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
							<line x1="5" y1="12" x2="19" y2="12"></line>
						</svg><span>Apps</span></div>
				</li>

				<li class="menu md-visible">
					<a href="apps_chat.html" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>Chat</span>
						</div>
					</a>
				</li>

				<li class="menu md-visible">
					<a href="apps_mailbox.html" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
								<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
								<polyline points="22,6 12,13 2,6"></polyline>
							</svg>
							<span>Mailbox</span>
						</div>
					</a>
				</li>

				<li class="menu md-visible">
					<a href="apps_todoList.html" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
								<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
								<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
							</svg>
							<span>Todo List</span>
						</div>
					</a>
				</li>

				<li class="menu md-visible">
					<a href="apps_notes.html" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
								<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
								<polyline points="14 2 14 8 20 8"></polyline>
								<line x1="16" y1="13" x2="8" y2="13"></line>
								<line x1="16" y1="17" x2="8" y2="17"></line>
								<polyline points="10 9 9 9 8 9"></polyline>
							</svg>
							<span>Notes</span>
						</div>
					</a>
				</li>

				<li class="menu md-visible">
					<a href="apps_scrumboard.html" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
								<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
								<polyline points="14 2 14 8 20 8"></polyline>
								<line x1="12" y1="18" x2="12" y2="12"></line>
								<line x1="9" y1="15" x2="15" y2="15"></line>
							</svg>
							<span>Scrumboard</span>
						</div>
					</a>
				</li>

				<li class="menu md-visible">
					<a href="apps_contacts.html" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
								<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
								<circle cx="12" cy="10" r="3"></circle>
							</svg>
							<span>Contacts</span>
						</div>
					</a>
				</li>

				<li class="menu md-visible">
					<a href="apps_invoice.html" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
								<line x1="12" y1="1" x2="12" y2="23"></line>
								<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
							</svg>
							<span>Invoice List</span>
						</div>
					</a>
				</li>

				<li class="menu md-visible">
					<a href="apps_calendar.html" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>Calendar</span>
						</div>
					</a>
				</li>

				<li class="menu menu-heading">
					<div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
							<line x1="5" y1="12" x2="19" y2="12"></line>
						</svg><span>MASTER DATA</span></div>
				</li>

				<li class="menu">
					<a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
								<ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
								<path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
								<path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
							</svg>
							<span>Master Proyek</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="components" data-parent="#accordionExample">
						<li>
							<a href="component_tabs.html"> Jenis Pekerjaan </a>
						</li>
						<li>
							<a href="component_accordion.html"> Kategori Biaya </a>
						</li>
						<li>
							<a href="component_modal.html"> Komponen Biaya </a>
						</li>
						<li>
							<a href="component_cards.html"> Pelanggan </a>
						</li>

					</ul>
				</li>


				<li class="menu">
					<a href="#elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hard-drive">
								<line x1="22" y1="12" x2="2" y2="12"></line>
								<path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
								<line x1="6" y1="16" x2="6.01" y2="16"></line>
								<line x1="10" y1="16" x2="10.01" y2="16"></line>
							</svg>
							<span>Master Keuangan</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="elements" data-parent="#accordionExample">
						<li>
							<a href="element_alerts.html"> Cara Pembayaran </a>
						</li>
						<li>
							<a href="element_alerts.html"> Charts Of Account </a>
						</li>
						<li>
							<a href="element_alerts.html"> Pengaturan Transaksi </a>
						</li>
					</ul>
				</li>
				<!-- end of master data menus -->

				<li class="menu menu-heading">
					<div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
							<line x1="5" y1="12" x2="19" y2="12"></line>
						</svg><span>Transaksi</span></div>
				</li>
				<li class="menu">
					<a href="#datatables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
								<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
								<polyline points="14 2 14 8 20 8"></polyline>
								<line x1="12" y1="18" x2="12" y2="12"></line>
								<line x1="9" y1="15" x2="15" y2="15"></line>
							</svg>
							<span>Proyek</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="datatables" data-parent="#accordionExample">
						<li>
							<a href="table_dt_basic.html"> Kontrak Proyek </a>
						</li>
						<li>
							<a href="table_dt_basic-dark.html"> Timeline Proyek </a>
						</li>
					</ul>
				</li>

				<li class="menu">
					<a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
								<line x1="12" y1="1" x2="12" y2="23"></line>
								<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
							</svg>
							<span>Keuangan</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="forms" data-parent="#accordionExample">
						<li>
							<a href="form_bootstrap_basic.html"> Anggaran Proyek </a>
						</li>
						<li>
							<a href="form_input_group_basic.html"> Realisasi Proyek </a>
						</li>
						<li>
							<a href="form_layouts.html"> Pembayaran </a>
						</li>
					</ul>
				</li>

				<li class="menu menu-heading">
					<div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
							<line x1="5" y1="12" x2="19" y2="12"></line>
						</svg><span>Laporan</span></div>
				</li>

				<li class="menu">
					<a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor">
								<rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
								<line x1="8" y1="21" x2="16" y2="21"></line>
								<line x1="12" y1="17" x2="12" y2="21"></line>
							</svg>
							<span>Laporan Proyek</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">
						<li>
							<a href="user_profile.html">Laporan Anggaran</a>
						</li>
						<li>
							<a href="user_account_setting.html">Laporan Realisasi</a>
						</li>
					</ul>
				</li>

				<li class="menu">
					<a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
								<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
								<path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
							</svg>
							<span>Keuangan</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="pages" data-parent="#accordionExample">
						<li>
							<a href="pages_helpdesk.html"> Jurnal Umum</a>
						</li>
						<li>
							<a href="pages_contact_us.html"> Buku Besar </a>
						</li>
						<li>
							<a href="pages_faq.html"> Laporan Pembayaran</a>
						</li>
					</ul>
				</li>
				<!-- end of report menu -->

				<li class="menu menu-heading">
					<div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
							<line x1="5" y1="12" x2="19" y2="12"></line>
						</svg><span>Pengaturan</span></div>
				</li>

				<li class="menu">
					<a href="#authentication" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
								<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
								<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
							</svg>
							<span>Pengguna</span>
						</div>
					</a>
				</li>
			</ul>
		</nav>

	</div>
	<!--  END SIDEBAR  -->
