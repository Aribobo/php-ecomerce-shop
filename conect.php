<?php


$dbhost = "localhost";

$dbuser = "Arizona";

$dbpass = "82434895@stan";

$dbname = "cpanel";

       if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect! ");
}

?>