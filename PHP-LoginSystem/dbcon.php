<?php
$DB_HOST = 'faurholtdesign.com.mysql';
$DB_USER = 'faurholtdesign_com_flow';
$DB_PASS = '22Fa@2860';
$DB_NAME = 'faurholtdesign_com_flow';
// $DB_PORT = '8889';

$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
//$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
if ($link->connect_error) { 
   die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset('utf8'); 
?>