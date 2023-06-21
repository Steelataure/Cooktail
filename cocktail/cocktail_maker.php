<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

?>

	<body class="is-preload">
	</body>

<?php
$content = ob_get_clean();
include 'layout.php';
?>
