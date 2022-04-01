<?php
require_once 'tryCookie.php';
if(tryCookie()){
if(isset($_POST["name"])){
$name = $_POST["name"];
}
if(isset($_POST["patro"])){
$patro = $_POST["patro"];
}
if(isset($_POST["surname"])){
$surname = $_POST["surname"];
}
if(isset($_POST["passport"])){
$passport = $_POST["passport"];
}
if(isset($_POST["phone"])){
$phone = $_POST["phone"];
}
if(isset($_POST["room"])){
$room = $_POST["room"];
}
require_once 'connection.php';
require_once 'dateFormation.php';
$timestamp = dateFormation();
$query ="INSERT INTO person(RoomNumberId, PersonName, Surname, Patron
ymic, PhoneNumber, Passport) VALUES ($room, '$name', '$surname', '$patro', '$
phone', '$passport')";
$result = mysqli_query($link, $query) or die("Ошибка добавление посто
яльца".mysqli_error($link));
$query = "UPDATE roomnumber set isBooked=1 where ID=$room";
$result = mysqli_query($link, $query) or die("Ошибка установки занято
сти номера".mysqli_error($link));
$query = "UPDATE roomnumber set CheckInDate='$timestamp' where ID=$ro
om";
$result = mysqli_query($link, $query) or die("Ошибка установки даты з
анятия номера".mysqli_error($link));
$link->close();
header('Location:http://localhost/index.php');
}
else{
echo '<a href="http://localhost/index.php">На главную</a>Недостаточно
прав';
}
?>