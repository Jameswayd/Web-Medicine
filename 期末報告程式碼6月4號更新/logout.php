<?php
// 啟動或恢復先前的Session
session_start();

// 清除Session資料
session_unset();

// 銷毀Session
session_destroy();

// 重新導向至登入頁面
header("Location:Login-Page.php");
exit();
?>
