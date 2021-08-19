<html>
<body><h3><pre>
<?php
ini_set('display_errors', 1);
$user = isset($_POST['user']) ? $_POST['user'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$link = mysqli_connect('db','fuckbighead','bigheadsuck') or die('Error with MySQL connection');
mysqli_select_db($link,'adlctf');
$result = mysqli_query($link, "SELECT * FROM users where user='$user' and password='$password'; ");
mysqli_close($link);

if(mysqli_num_rows($result)==0){
	echo "Login Failed ...";
} else {
	echo 'Login Successful!\nThe Flag 1 is AD{SQLi_1s_fxxkin9_Ea5y?}\nThe flag 2 is admin\'s password\n\n Warning:這很重要所以用中文，禁止使用 sqlmap，你必須自己寫 script，如果 demo 時，你無法證明你的達成方式，你將拿不到分數或扣分';
}

?>
</pre></h3>
