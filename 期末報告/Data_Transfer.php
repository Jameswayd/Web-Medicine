<?php
session_start(); // 開始Session

$servername = "localhost"; // 資料庫主機名稱
$username = "root"; // 資料庫使用者名稱
$password = ""; // 資料庫密碼
$dbname = "wenting"; // 資料庫名稱

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 獲取Session中存儲的第一個表單的資料
$name = $_SESSION['name'];
$birthday = $_SESSION['birthday'];
$telephone = $_SESSION['telephone'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];
$password = $_SESSION['password'];
$confirmPassword = $_SESSION['confirmPassword'];
$sex = $_SESSION['sex'];

// Retrieve the form data using the $_POST superglobal
$emergency_contact_telephone = $_POST["emergency_contact_telephone"];
$past_illness = implode(", ", $_POST['past-illness']);
$other_past_illness = $_POST['other_past_illness'];
$family_history_illness = implode(", ", $_POST['family-history-illness']);
$other_history_illness = $_POST['other_history_illness'];
$healthy_behavior = implode(", ", $_POST['healthy_behavior']);


// Prepare the SQL statement to insert the form data into a table
$stmt = $conn->prepare("INSERT INTO users (Name, Birthday, Telephone, Email, Address, Password, SEX, emergency_contact_telephone, past_illness, other_past_illness, family_history_illness, other_history_illness, healthy_behavior) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind the form data to the SQL statement parameters
$stmt->bind_param("sssssssssssss", $name, $birthday, $telephone, $email, $address, $password, $sex, $emergency_contact_telephone, $past_illness, $other_past_illness, $family_history_illness, $other_history_illness, $healthy_behavior);

// Execute the prepared statement to insert the form data into the database
if ($stmt->execute()) {
    echo "帳號建立成功";
    // 進行頁面跳轉或其他操作
    header("Location: chaxun.html");
} else {
    echo "錯誤: " . $stmt->error;
}


// Close the statement and the database connection
$stmt->close();
$conn->close();
