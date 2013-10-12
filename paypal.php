<?php 
include("includes/header.php");
include("includes/paypal_header.php");

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\CreditCard;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;

if(isset($_POST["userEmail"])) {
	$userEmail = $_POST["userEmail"];
	$merchantEmail = $_POST["merchantEmail"];

	$productName = $_POST["productName"];
	$productPrice = $_POST["productPrice"];
} else {
	//mock up the values
	$userEmail = "user@luvldn.com";
	$merchantEmail = "merchant@luvldn.com";

	$productName = "Organic Vintage Leggings";
	$productPrice = "20.00";
}


session_start();
$payer = new Payer();
$payer->setPaymentMethod("paypal");

// ### Itemized information
// (Optional) Lets you specify item wise
// information
$item = new Item();
$item->setName($productName);
$item->setCurrency('GBP');
$item->setQuantity(1);
$item->setPrice($productPrice);

$itemList = new ItemList();
$itemList->setItems(array($item));

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
$amount = new Amount();
$amount->setCurrency("GBP");
$amount->setTotal($productPrice);
$amount->setDetails($details);


// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it. 
$transaction = new Transaction();
$transaction->setAmount($amount);
$transaction->setItemList($itemList);
$transaction->setDescription("LuvLDN payment");

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("http://luvldn.com/~dyn/paymentResult.php?success=true");
$redirectUrls->setCancelUrl("http://luvldn.com/~dyn/paymentResult.php?success=false");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to sale 'sale'
$payment = new Payment();
$payment->setIntent("sale");
$payment->setPayer($payer);
$payment->setRedirectUrls($redirectUrls);
$payment->setTransactions(array($transaction));

try {
	$payment->create($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage();
	echo "Result json: " . $ex->getData();
	
}

foreach($payment->getLinks() as $link) {
	if($link->getRel() == 'approval_url') {
		echo $link->getHref();
		$redirectUrl = $link->getHref();
		break;
	}
}

echo "stuff happens";

$_SESSION['paymentId'] = $payment->getId();
if(isset($redirectUrl)) {
	header("Location: " . $redirectUrl);
	exit;
}
?> 

<?php include("includes/footer.php"); ?>