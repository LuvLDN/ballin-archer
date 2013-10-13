<?php include("includes/header.php"); ?>

<?php 

$success = $_GET["success"];

if ($success) {
	header('Location: http://luvldn.com/paymentSuccess.html');
} else {
	header('Location: http://luvldn.com/paymentFailed.html');
}
?>

<?php include("includes/footer.php"); ?>

