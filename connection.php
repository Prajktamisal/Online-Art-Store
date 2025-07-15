<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "art_store";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
