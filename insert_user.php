<?php
	session_start();
	if($_SESSION['login'] != "OK")
	{
		header('Location: login.php');
		exit();
	}
?>
<html>
	<head>
		<title>Web Scripting - Josh Simpson</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Web Scripting</a> by Josh Simpson</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Criteria</a>
								<ul>
                                    <li><a href="upload.html">Upload File</a></li>
                                    <li><a href="guestbook.html">Guestbook</a></li>
                                    <li><a href="screen.html">System Data Checker</a></li>
                                    <!---Removed, used for other pages
									<li><a href="generic.html">Generic</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="elements.html">Elements</a></li>
                                    -------------------------------------------->
								</ul>
							</li>
							<li><a href="login.php" class="button">Sign In</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>User Creation</h2>
						<p>Please enter details for the new user.</p>
					</header>
					<div class="box">

                        <?php
                        	session_start();
                        	if($_SESSION['login'] != "OK")
                        	{
                        		header('Location: login.php');
                        		exit();
                        	}

                        	$new_user = $_POST["new_username"];
                        	$new_pass = $_POST["new_password"];
                        	$conn = @mysql_connect ("mysql.hostinger.co.uk", "u638900915_admin", "projectmayhem")
                        		or die ("Sorry - unable to connect to MySQL Database.");
                        	$rs = @mysql_select_db ("u638900915_admin", $conn) or die ("error");
                        	$sql = "INSERT INTO user (username, password) VALUES ('$new_user', '$new_pass')";
                        	mysql_query($sql,$conn) or die ("User creation failed.");
                        	echo "<p>User created successfully.</p>";
                        	echo "<p>Return to <a href='protected.php'>application</a> or <a href='login.php'>log out</a></p>";
                        ?>

						<!---------------- Contact form, unneccesary------------------------------
                        <form method="post" action="#">
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
									<input type="text" name="name" id="name" value="" placeholder="Name" />
								</div>
								<div class="6u 12u(mobilep)">
									<input type="email" name="email" id="email" value="" placeholder="Email" />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="subject" id="subject" value="" placeholder="Subject" />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
								</div>
							</div>
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" value="Send Message" /></li>
									</ul>
								</div>
							</div>
						</form>
                        ----------------------------------------------------------------------->
					</div>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="http://www.twitter.com/geekjosh92" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://github.com/lazyghoul" class="icon fa-github"><span class="label">Github</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Josh Simpson. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
