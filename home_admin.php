<?php
session_start();

// ตรวจสอบว่ามี session หรือไม่
if (!isset($_SESSION["user_id"]) || $_SESSION["rank"] != 1) {
    // ถ้าไม่มี session หรือ rank ไม่ใช่ admin ให้ redirect ไปยังหน้า login
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>

    <div class='flex justify-center'>
        <div class='p-10'>
            <h1 class='text-orange-500 text-3xl text-center'>
                Admin
            </h1>
            <div class='bg-blue-500 w-5 h-1 rounded-full'></div>
        </div>
    </div>

    <?php

        if ($_SESSION["rank"] == 0) {
            echo "Welcome " . $_SESSION["username"];
        } elseif ($_SESSION["rank"] == 1) {
            echo "<div class='flex justify-center'>";
            echo "<p class='text-blue-500'>";
            echo "Welcome : ";
            echo "<span class='text-orange-500'>";
            echo "" . $_SESSION["username"];
            echo "</span>";
            echo "</span>";
            echo "</div>";
        }

    ?>

    <div class='flex justify-center pt-10'>
        <a href="logout.php" class='text-rose-500 bg-rose-200 rounded-full px-5'>Logout</a>
    </div>

    <footer class='pt-5'>
        <h1 class='text-blue-500 text-xs text-center'>Nomads <span class='text-orange-500'>Developer</span></h1>
    </footer>
    
</body>
</html>