<?php
session_start();

if (!isset($_SESSION["user_id"]) || $_SESSION["rank"] != 0) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
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
            <h1 class='text-blue-500 text-center text-3xl'>
                User
            </h1>
        </div>
    </div>

<?php
    if ($_SESSION["rank"] == 0) {
            echo "<div class='flex justify-center'>";
            echo "<p class='text-blue-500'>";
            echo "Welcome : ";
            echo "<span class='text-orange-500'>";
            echo "" . $_SESSION["username"];
            echo "</span>";
            echo "</span>";
            echo "</div>";
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

    <div class='flex justify-center pt-5'>
        <a href="logout.php" class='text-rose-500 bg-rose-200 rounded-full px-5'>Logout</a>
    </div>

    <footer class='pt-5'>
        <h1 class='text-blue-500 text-xs text-center'>Nomads <span class='text-orange-500'>Developer</span></h1>
    </footer>
    
</body>
</html>