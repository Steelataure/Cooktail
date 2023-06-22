<?php
ob_start();
session_start();

?>

	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
							<div class="centerBox mt-5">
								<h1>Oops...</h1>
								<p>Cocktail non trouvé</p>
							</div>
					</div>
				</div>
			</body>

<?php
$content = ob_get_clean();
include 'layout.php';
