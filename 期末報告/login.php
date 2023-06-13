<?php
session_start();

// 資料庫連線設定
$servername = "localhost"; // 資料庫主機名稱
$username = "root"; // 資料庫使用者名稱
$password = ""; // 資料庫密碼
$dbname = "wenting"; // 資料庫名稱

// 建立資料庫連線
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

// 檢查是否有 POST 的資料
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 取得使用者輸入的 email 和 password
    $email = $_POST["email"];
    $password = $_POST["password"];

    // 比對使用者輸入的 email 和 password 是否與資料庫中的相符
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // 登入成功
        $_SESSION["email"] = $email;

        // 重新導向至主頁面
        header("Location: chaxun.html");
        exit();
    } else {
        // 登入失敗
        header("Location: Login-Page.php?error=1");
        exit();
    }
}

// 關閉資料庫連線
$conn->close();
