<?php
session_start(); // 開始Session

// 獲取表單欄位值
$name = $_POST["Name"];
$birthday = $_POST["Birthday"];
$telephone = $_POST["Telephone"];
$email = $_POST["Email"];
$address = $_POST["Address"];
$password = $_POST["Password"];
$confirmPassword = $_POST["ConfirmPassword"];
$sex = $_POST["SEX"];

// 將表單資料存入Session變數
$_SESSION['name'] = $name;
$_SESSION['birthday'] = $birthday;
$_SESSION['telephone'] = $telephone;
$_SESSION['email'] = $email;
$_SESSION['address'] = $address;
$_SESSION['password'] = $password;
$_SESSION['confirmPassword'] = $confirmPassword;
$_SESSION['sex'] = $sex;

header("Location: account2.html");
exit; // 結束程式的執行
?>
