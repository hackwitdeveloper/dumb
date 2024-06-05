<div class="header-area" id="sticky-header">
		<div class="container">
			<div class="row align-items-center d-flex">
				<div class="col-lg-3">
					<div class="header-logo">
						<a class="main-logo" href="index.php"><img src="assets/images/other.png" alt=""></a>
						<a class="stiky-logo" href="index.php"><img src="assets/images/one.png" alt=""></a>
					</div>
				</div>
				<div class="col-lg-9">
					<nav class="cryptozen_menu">
						<div class="header-menu">
							<ul class="nav_scroll">
								<li><a href="#">Discover<span><i class="fas fa-angle-down"></i></span></a>
									<div class="sub-menu">
										<ul>
											<li><a href="about.php">About Us</a></li>
											<li><a href="team.php">Team </a></li>
											<li><a href="blog.php">Blogs </a></li>
											<li><a href="news.php">News & Press Release</a></li>
											
										</ul>
									</div>
								<!-- </li>
								<li><a href="about.html">Forums</a>
								</li> -->
								<li><a href="#">Forums<i class="fas fa-angle-down"></i></a>
									<div class="sub-menu">
										<ul>
											<?php
											include('connect.php');

											$select_query = "SELECT * FROM `forumlist` WHERE status ='Active' ORDER BY `status` ASC";
											
											$run = mysqli_query($connect,$select_query);
											
											while ($row = mysqli_fetch_array($run)) {
											?>
											<li><a href="forum.php?forum=<?php echo $row['forumname']; ?>&forumid=<?php echo $row['forumid']; ?>"><?php echo $row['forumname']; ?></a></li>
											<?php } ?>
											
										</ul>
									</div>
								</li>
								<li><a href="whitepapers.php">Whitepapers</a>
								</li>
								<li><a href="contact.php">Contact</a>
								</li>
								
							</ul>
							<div class="header-btn">
								<a href="register.php">Register Now - Get Bonus</a>
							</div>
							<div class="header-btn">
								<a href="login.php">Login</a>
							</div>
							<!-- <div class="sidebar">
								<div class="header-src-btn">
									<div class="search-box-btn search-box-outer"><i class="fas fa-search"></i></div>
								</div> -->
								<!-- <div class="nav-btn navSidebar-button"><span class="icon flaticon-menu-2"></span></div> -->
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- mobile menu seection -->
	<div class="mobile-menu-area d-sm-block d-md-block d-lg-none ">
		<div class="mobile-menu">
			<nav class="itsoft_menu">
				<ul class="nav_scroll">
					<li><a href="#">Discover</a>
						<div class="sub-menu">
							<ul>
                            <li><a href="about.php">About US</a></li>
											<li><a href="team.php">Team </a></li>
											<li><a href="blog.php">Blogs </a></li>
											<li><a href="news.php">News & Press Release</a></li>
							</ul>
						</div>
					
					<li><a href="#">Forums</a>
						<div class="sub-menu">
							<ul>
                            <li><a href="forum.php">Traders & Crypto Forum</a></li>
											<li><a href="forum.php">Advisors Forum</a></li>
											<li><a href="forum.php">Humb Notices</a></li>
											<li><a href="forum.php">Support Forum</a></li>
							</ul>
						</div>
					</li>
					<li><a href="whitepapers.php">Whitepapers</a>
					</li>
					<li><a href="contact.php">Contact</a>
					</li>
					
				</ul>
			</nav>
		</div>
	</div>