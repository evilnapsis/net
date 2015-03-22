<?php
session_start();
include "lib/hikari/loader.php";

$hkr = new Hikari("index"); // param: nombre de la aplicacion
$hkr->init(); // load pre configurations
$hkr->run();


?>