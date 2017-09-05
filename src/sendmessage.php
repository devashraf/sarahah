<?php
include 'database/connect.php';

$method = $_SERVER['REQUEST_METHOD'];

if(isset($method) && !empty($_POST['message'])){
	
	$msg = $_POST['message'];
	
	// Handle Error
	
	$error;
	
	if($msg !== htmlentities($msg)){
		$error = 'This Kind of strings is not allowed';
	}
	
	if(isset($error)){
		echo 
			'
				<div style="background-color = #fff;">
				' . $error . '
				</div>
			';
	} else {
		date_default_timezone_set('Africa/Cairo');
		
		$date = date('Y-m-d h-i');
		
		$insert = $db->prepare("INSERT INTO s_messages(`m_date`, `m_body`) VALUES (:date, :msg)");
		
		$insert->execute(array(
			':date' => $date,
			':msg' => $msg
		));
		
		header('Location: ../thanks.php');
	}
}