<?php
header('Content-type: text/html; charset=utf-8');
$from_name = $_POST['from_name'];
$from_email = $_POST['from_email'];
$subject = $_POST['subject'];
$mail_text = $_POST['mail_text'];
//Говорят, что UTF-8 лучше не отправлять, т.к. не всегда русские символы отобрадаются корректно, поэтому конвертируем в windows-1251
$message = iconv('utf-8','windows-1251',$mail_text);
$headers = "MIME-Version: 1.0rn";
$headers .= "Content-type: text/html; charset=windows-1251rn";
$headers .= "From: $from_email";
$mail_to = $_POST['text'];
    //Отправляем Email и проверяем на удачу
   if (mail($mail_to, $subject, $mail_text, $headers)){
      echo "сообщение принято к доставке";
   }else{
      echo "что-то пошло не так";
   } 
?>
