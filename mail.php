<!-- Отправка на e-mail -->
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

<!-- Отправка В Телеграмм -->
<?php
	/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
	где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */
	
	$token = "876062805:AAFPmWUO_jM2ukFVhEaUvPkDuMMXR7O__Po";
	$chat_id = "-362101719";
	
	$txt = "<b>".'Форма: '."</b>".$title."%0A";
	
	if ( $phone || $name || $usermessage ) {
		$txt .= ""
		. ( $name  ? "<b>".'Имя: '."</b>".$name."%0A" : "")
		. ( $phone ? "<b>".'Телефон: '."</b>%2b".$phone."%0A" : "")
		. ( $usermessage ? "<b>".'Сообщение: '."</b>".$usermessage."%0A" : "");
	}		
	
	fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
?>