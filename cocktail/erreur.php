<?php
ob_start();
session_start();
$text = $_SESSION['textError'];
?>

	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
							<div class="centerBox mt-5">
								<h1>Oops...</h1>
								<p><?php 
								echo $text 
								?></p>
							</div>
					</div>
				</div>
			</body>

<?php
$content = ob_get_clean();
include 'layout.php';
include 'footer.php';?>
