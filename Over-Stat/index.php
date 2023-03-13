<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}

	
	define('PRODUCTION', true);

	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/Over-Stat/home.php');
	exit;



?>
