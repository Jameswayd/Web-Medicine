<?php
header('Content-Type: text/html; charset=utf-8');


$servername = "localhost";
$username = "root";
$password = "";
$database = "wenting";
$conn = new mysqli($servername, $username, $password, $database);


$sql = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 檢查是否收到名為 "value" 的 POST 參數
    if (isset($_POST["value"])) {
        $receivedValue = $_POST["value"];
        echo ($receivedValue);
        switch ($receivedValue) {
            case $receivedValue == "嘔吐":
                $sql = "SELECT * FROM yaoping WHERE bingzheng = '嘔吐'";
                getyaoping($sql, $conn);
                break;
            case $receivedValue == "頭疼":
                $sql = "SELECT * FROM yaoping WHERE bingzheng = '頭疼'";
                getyaoping($sql, $conn);
                break;
            case $receivedValue == "腹瀉":
                $sql = "SELECT * FROM yaoping WHERE bingzheng = '腹瀉'";
                getyaoping($sql, $conn);
                break;
            case $receivedValue == "感冒":
                $sql = "SELECT * FROM yaoping WHERE bingzheng = '感冒'";
                getyaoping($sql, $conn);
                break;
            default:
                yaoming($receivedValue, $conn);
        }
    } else {
        echo "未收到任何值";
    }
}

function getyaoping($chaxun, $conn)
{

    $sql = $chaxun;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // 遍歷結果集並輸出數據
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
            $jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $jsondata;
            // echo "中文: " . $row["chname"] . ", 英文: " . $row["egname"] . ", 作用: " . $row["effect"] . ", 副作用: " . $row["side_effect"] . ", 圖片: " . $row["img"] . ", 病症: " . $row["bingzheng"] . "<br>";
        }
    } else {
        echo "沒有找到匹配的數據";
    }
    $conn->close();
}

function yaoming($receivedValue, $conn)
{
    $sql = "";
    $input = $receivedValue;
    $ary = array();
    if (char($receivedValue)) {
        $sql = "SELECT * FROM yaoping WHERE chname = '$input'";
    } else {
        $sql = "SELECT * FROM yaoping WHERE egname = '$input'";
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // 遍歷結果集並輸出數據
        while ($row = $result->fetch_assoc()) {
            // array('中文名稱：' => $row["chname"], '英文' => $row["egname"], '作用：' => $row["effect"], '副作用' => $row["side_effect"], '圖片' => $row["img"]);
            // echo "中文: " . $row["chname"] . ", 英文: " . $row["egname"] . ", 作用: " . $row["effect"] . ", 副作用: " . $row["side_effect"] . ", 圖片: " . $row["img"] . ", 病症: " . $row["bingzheng"];
            $data[] = $row;
            $jsonString = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $jsonString;
        }
    } else {
        echo "沒有找到匹配的數據";
    }
    $conn->close();
}

function char($input)
{
    $pattern = '/[\x{4e00}-\x{9fa5}]/u';
    return preg_match($pattern, $input);
}
