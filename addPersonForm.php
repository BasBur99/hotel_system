<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="static/css/styles.css" rel="stylesheet">
<title>Гостиница.ру</title>
</head>
<body>
<div class="header">
<div class="title"><h1>Добавить постояльца</h1></div>
</div>
<div class="main">
<?php
require_once 'tryCookie.php';
require_once 'connection.php';
$query ="SELECT ID FROM roomnumber";
$result = mysqli_query($link, $query) or die("Ошибка вывода н
омеров" . mysqli_error($link));
if(tryCookie()){
?>
<form action="addPerson.php" method="POST">
<div class="input">
<div class="param"><input type="text" name="name" placeho
lder="Имя"></div>
</div>
<div class="input">
<div class="param"><input type="text" name="patro" placeholder="Отчество"></div>
</div>
<div class="input">
<div class="param"><input type="text" name="surname" placeholder="Фамилия"></div>
</div>
<div class="input">
<div class="param"><input type="text" name="passport" placeholder="Серия/номер паспорта"></div>
</div>
<div class="input">
<div class="param"><input type="text" name="phone" placeholder="Контактный телефон"></div>
</div>
<div class="input">
<select name="room">
<option selected disabled>Выберите номер</option>
<?php
while($row = mysqli_fetch_array($result)) {
echo '<option>'.$row[0].'</option>';
}
?>
</select>
</div>
<div class="title">
<div class="button">
<input type="submit" value="Отправить">
</div>
</div>
</form>
<?php
}
else{
echo '<a href="http://localhost/index.php">На главную</a>
Недостаточно прав';
}
?>
</div>
<div class="footer">
<div class="title"><p><a href="mailto:konst.02@yandex.ru">Contact
s: konst.02@yandex.ru</a></p></div>
<div class="title"><p>Copyright © Гостиница.ру, 2021</p></div>
</div>
</body>
</html>