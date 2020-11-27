<?php
include "../lib/Session.php";
Session::checkSession();
if(isset($_GET['action']) and ($_GET['action'] == "logout"))
{
	Session::destroy();
}
?>