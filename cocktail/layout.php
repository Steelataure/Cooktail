<!DOCTYPE HTML>
<html>
	<head>
		<title>Cooktail</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="./front/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="./front/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="symbol"><img src="./front/images/logo.svg" alt="" /></span><span class="title">Cooktail</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
                                        <?php if (isset($_SESSION['isLogged'])){ ?>
                                        <div>
                                            <ul>
                                                <li>
                                                    <span>Connecté en tant que : <?php echo $_SESSION['isLogged']; ?></span>
                                                    <form method="POST" action="logout.php">
                                                    <button type="submit" name="deconnexion">Déconnexion</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php } else { ?>
                                        <div>
                                            <ul>
                                                <li>
                                                    <a href="inscription.php">Inscription</a>
                                                </li>
                                                <li>
                                                    <a href="login.php">Login</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php } ?>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="./front/generic.html">Ipsum veroeros</a></li>
							<li><a href="./front/generic.html">Tempus etiam</a></li>
							<li><a href="./front/generic.html">Consequat dolor</a></li>
							<li><a href="./front/elements.html">Elements</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header>
								<h1>Cooktail</h1>
								<p>Projet étudiant</p>
							</header>
							<section class="tiles">
								<article class="style1">
									<span class="image">
										<img src="./front/images/pic01.jpg" alt="" />
									</span>
									<a href="">
										<h2>Magna</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="./front/images/pic02.jpg" alt="" />
									</span>
									<a href="">
										<h2>Lorem</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style3">
									<span class="image">
										<img src="./front/images/pic03.jpg" alt="" />
									</span>
									<a href="">
										<h2>Feugiat</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style4">
									<span class="image">
										<img src="./front/images/pic04.jpg" alt="" />
									</span>
									<a href="">
										<h2>Tempus</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="./front/images/pic05.jpg" alt="" />
									</span>
									<a href="">
										<h2>Aliquam</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style6">
									<span class="image">
										<img src="./front/images/pic06.jpg" alt="" />
									</span>
									<a href="">
										<h2>Veroeros</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="./front/images/pic07.jpg" alt="" />
									</span>
									<a href="">
										<h2>Ipsum</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style3">
									<span class="image">
										<img src="./front/images/pic08.jpg" alt="" />
									</span>
									<a href="">
										<h2>Dolor</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style1">
									<span class="image">
										<img src="./front/images/pic09.jpg" alt="" />
									</span>
									<a href="">
										<h2>Nullam</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="./front/images/pic10.jpg" alt="" />
									</span>
									<a href="">
										<h2>Ultricies</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style6">
									<span class="image">
										<img src="./front/images/pic11.jpg" alt="" />
									</span>
									<a href="">
										<h2>Dictum</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
								<article class="style4">
									<span class="image">
										<img src="./front/images/pic12.jpg" alt="" />
									</span>
									<a href="">
										<h2>Pretium</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article>
							</section>
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Get in touch</h2>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<input type="text" name="name" id="name" placeholder="Name" />
										</div>
										<div class="field half">
											<input type="email" name="email" id="email" placeholder="Email" />
										</div>
										<div class="field">
											<textarea name="message" id="message" placeholder="Message"></textarea>
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send" class="primary" /></li>
									</ul>
								</form>
							</section>
							<section>
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
									<li><a href="#" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
									<li><a href="#" class="icon brands style2 fa-500px"><span class="label">500px</span></a></li>
									<li><a href="#" class="icon solid style2 fa-phone"><span class="label">Phone</span></a></li>
									<li><a href="#" class="icon solid style2 fa-envelope"><span class="label">Email</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="./front/assets/js/jquery.min.js"></script>
			<script src="./front/assets/js/browser.min.js"></script>
			<script src="./front/assets/js/breakpoints.min.js"></script>
			<script src="./front/assets/js/util.js"></script>
			<script src="./front/assets/js/main.js"></script>

	</body>
</html> 