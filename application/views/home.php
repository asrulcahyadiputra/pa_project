		<?php $this->load->view('partials/header') ?>
		<!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
						</ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- overview area start -->
                <div class="row mt-5">
                    <div class="col-xl-9 col-lg-8">
                        <div class="card">
							<div class="card-header">
								<h4>CV MANGKUBUMI</h4>
							</div>
                            <div class="card-body">
                                <div class="justify-content-between align-items-center text-center">
									<h4>Selamat Datang, Administrator !</h4>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 coin-distribution">
                        <div class="card h-full">
							<div class="card-header">
								<h4 class="header-title mb-0">Informasi Login</h4>
							</div>
                            <div class="card-body">
                                <table class="table">
									<tr>
										<th>Browser</th>
										<th>: Crhome</th>
									</tr>
									<tr>
										<th>OS</th>
										<th>: MAC OS X</th>
									</tr>
								</table>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- overview area end -->
            </div>
        </div>
        <!-- main content area end -->
       <?php $this->load->view('partials/footer'); ?>
