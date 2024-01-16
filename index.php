<?php
session_start();

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION["user_id"])) {
    if ($_SESSION["rank"] == 0) {
        header("Location: home_user.php");
        exit();
    } elseif ($_SESSION["rank"] == 1) {
        header("Location: home_admin.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // เก็บข้อมูลผู้ใช้ใน Session
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["rank"] = $row["rank"];

        if ($row["rank"] == 0) {
            header("Location: home_user.php");
        } elseif ($row["rank"] == 1) {
            header("Location: home_admin.php");
        }
        } else {
            echo "<div class='flex justify-center py-5'>";
            echo "<p class='text-rose-500 bg-rose-200 rounded-full px-5'>";
            echo "The username or password is incorrect.";
            echo "</p>";
            echo "</div>";
        }
        }

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <h2 class='text-orange-500 text-3xl'>Login <span class='text-blue-500'>Admin</span></h2>
            <div class='bg-blue-500 w-5 h-1 rounded-full'></div>
        </div>
    </div>
    <div class='flex justify-center'>
        <form action="" method="post">
            <label for="username" class='text-blue-500'>Username :</label>
            <input type="text" name="username" required class='border border-blue-500 rounded-full pl-2'>
            <br>
            <br>
            <label for="password" class='text-blue-500'>Password:</label>
            <input type="password" name="password" required class='border border-orange-500 rounded-full pl-2'>
            <br>
            <div class='pt-5'>
                <input type="submit" value="Login" class='text-orange-500 bg-orange-200 rounded-full px-5 shadow-sm'>
            </div>
        </form>
    </div>
    
    <footer class='pt-5'>
        <h1 class='text-blue-500 text-xs text-center'>Nomads <span class='text-orange-500'>Developer</span></h1>
    </footer>
</body>
</html>