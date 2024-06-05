<div class="footer pt-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-location-box">
						<div class="footer-logo">
							<img src="assets/images/one.png" alt="Footer-logo">
						</div>
						<div class="footer-content">
							<p>Together, let's build a healthier, more inclusive world powered by blockchain technology and Tokenisation. Welcome to Humb – where healthcare meets the blockchain.</p>
						</div>
					</div>
					<div class="footer-social-box">
						<div class="social-content">
							<h3>Follow Us</h3>
						</div>
						<div class="footer-about-social-icon pt-20">
						<ul>
							<li>
								<a href="https://www.facebook.com/Humbex24" target="_blank"><i class="fab fa-facebook-f"></i></a>
							</li>
							<li>
								<a href="https://twitter.com/humb24" target="_blank"><i class="fab fa-twitter"></i></a>
							</li>
							<li>
								<a href="https://www.instagram.com/humbex_insta" target="_blank"><i class="fab fa-instagram"></i></a>
							</li>
							<li>
								<a href="https://www.linkedin.com/company/99412147/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
							</li>
							<li>
								<a href="#"><i class="fab fa-telegram"></i></a>
							</li>
						</ul>
					</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="widget">
						<div class="footer-quick-link">
							<div class="footer-widget-title">
								<h3>Discover</h3>
							</div>
							<div class="footer-quick-link-list">
								<ul>
									<li><a href="about.php">About Us</a></li>
									<li><a href="team.php">Team</a></li>
									<li><a href="blog.php">Blogs</a></li>
									<li><a href="news.php">News & Press Release</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="widget">
						<div class="footer-quick-link-list">
							<div class="footer-widget-title">
								<h3>Quick Links</h3>
							</div>
							<div class="footer-quick-link-list">
								<ul>
									<li><a href="forum.php">Traders & Crypto Forums</a></li>
									<li><a href="forum.php">Advisors Forum</a></li>
									<li><a href="forum.php">Humb Notices</a></li>
									<li><a href="forum.php">Support Forum</a></li>
                                    <li><a href="whitepapers.php">Whitepapers</a></li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 p-0">
					<div class="widget">
						<div class="footer-popular-post ">
							<div class="footer-widget-title two">
								<h3>Newsletter</h3>
							</div>
							<div class="footer-content-text">
								<p>Sent Us a Newsletter And Get Update</p>
							</div>
							<form action="footer.php" method="POST" >
								<div class="subscribe-area">
									<input class="subscribe-mail-box" type="email" name="email" placeholder="Enter Your Email...." required="">
									<button class="subscribe-button" name="newsletter" type="submit">Subscribe</button>
								</div>
							</form>
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										...
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save changes</button>
									</div>
									</div>
								</div>
								</div>
                            <?php
// Establilshing Connection into MYSQL!
include('connect.php');
if(isset($_POST['newsletter']))
{
        $email = $_POST['email'];
        date_default_timezone_set('Australia/Sydney');
        $date = date('d/m/Y - H:i:s');
    
        $insert_query = "INSERT INTO `newsletter`(`email`, `date`) VALUES('$email','$date')";

        if(mysqli_query($connect,$insert_query)){
			
			include('subscribermail.php');
            echo "<script>window.alert('News LetterSubscription Successful!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
              

        }else{
            echo mysqli_error($connect);
        }

}

?>
						
						</div>
					</div>

				</div>
			</div>
			<div class="row upper11 mt-50 align-items-center">
				<div class="col-lg-6 col-md-6">
					<div class="footer-copyright-text">
						<p class="text-white">Copyright © Humb all rights reserved. </p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="footer-copyright-content">
						<div class="footer-sicial-address-link">
							<ul>
								<li><a href="termsandconditions.php">Terms Condition</a></li>
								<li><a href="privacypolicy.php">Privacy Policy</a></li>
								<!-- <li><a href="faq.php">FAQ</a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	