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
// Каталог, в который мы будем принимать файл:
$uploaddir = './upload/';
$uploadfile = $uploaddir.basename($_FILES['file']['name']);

// Копируем файл из каталога для временного хранения файлов:
if (copy($_FILES['file']['tmp_name'], $uploadfile))
{
echo "<h3>Файл успешно загружен на сервер</h3>";
}
else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

// Выводим информацию о загруженном файле:
echo "<h3>Информация о загруженном на сервер файле: </h3>";
echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['file']['name']."</b></p>";
echo "<p><b>Mime-тип загруженного файла: ".$_FILES['file']['type']."</b></p>";
echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['file']['size']."</b></p>";
echo "<p><b>Временное имя файла: ".$_FILES['file']['tmp_name']."</b></p>";
/*$data = fopen($uploadfile, 'r');
if ($data) {
    while (($mail_to = fgets($base)) !== false) {
    //Отправляем Email и проверяем на удачу
   if (mail($mail_to, $subject, $mail_text, $headers)){
      echo "сообщение принято к доставке";
   }else{
      echo "что-то пошло не так";
   } 
    }
    fclose($base);
} else {
    echo 'Невозможно открыть указанный файл';
}
*/
?>
