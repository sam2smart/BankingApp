<?php

session_start();
require_once("classUsers.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$phone = strip_tags($_POST['email']);
	$umail = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['pass']);
	
	if($login->doLogin($phone,$umail,$upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		//include"../index.php";
		$login->redirect('../index.php');
	}
}

?>