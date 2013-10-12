<?php include("includes/header.php"); ?>

<?php 

$success = $_GET["success"];

if ($success) {
	echo '<div class="success">Your payment has been successful</div>';
} else {
	echo '<div class="failed">Your payment has not been successful</div>';
}
?>

<?php include("includes/footer.php"); ?>

