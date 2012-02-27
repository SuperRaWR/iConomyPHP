<?php
require 'iAccount.class.php';

//Create an account object for 'WDZ_SuperRaWR'
$iSuperRaWR = new iAccount('WDZ_SuperRaWR');

$iSuperRaWR->set(3000);

//Output the balance of the account
echo 'SuperRaWR\'s current balance: '.$iSuperRaWR->balance()."\n";

//Give the account 500 more tokens
echo "Giving SuperRaWR 500 tokens...\n";
$iSuperRaWR->give(500);

//Check balance after changes
echo 'SuperRaWR\'s balance is now: '.$iSuperRaWR->balance()."\n";

//Take tokens from account
echo "Taking 300 tokens from SuperRaWR...\n";
$iSuperRaWR->take(300);

//Check balance after changes
echo 'SuperRaWR\'s balance is now: '.$iSuperRaWR->balance()."\n";


?>