<?php
session_start();
session_unset();
session_destroy();

// Redirect ไปยังหน้า login
header("Location: index.php");
exit();
?>