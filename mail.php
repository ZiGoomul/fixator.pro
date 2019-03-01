<?
	if(isset ($_POST['title'])) {$title=$_POST['title'];}
	if(isset ($_POST['name'])) {$name=$_POST['name'];}
	if(isset ($_POST['phone-number'])) {$phone=$_POST['phone-number'];}
	if(isset ($_POST['user-message'])) {$usermessage=$_POST['user-message'];}

	$to = "order@fixator.pro";

	$message = "Форма: $title <br>";

	if ( $phone || $name || $usermessage ) {
		$message .= ""
			. ( $name  ? " Имя: $name <br>" : "")
			. ( $phone ? " Телефон:  $phone <br>" : "")
			. ( $usermessage ? " Сообщение:  $usermessage <br>" : "");
	}

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
	$headers .= "From: no-reply@fixator.pro"; 

	if (!$title) {
	} else {
		mail($to,"New lead(fixator.pro)",$message,$headers);
	}
?>