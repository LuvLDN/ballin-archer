<?php

require __DIR__ . '/../vendor/autoload.php';

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;


define('PP_CONFIG_PATH', ".");

$apiContext = new ApiContext(new OAuthTokenCredential('AU9j5BBtzlVIOv3sN_HjVrnDSvCXZnieXr0Vinoae4ePyD69UiYhEmnfZ1Qa', 'EDqx1hAP2T3dq_N-J8lJfO5Jngx5RrZWBCSROaEkTdrAL0DdUd878sObzTRn'));

?>