<?php
    include "./database.php";
    $message = '';
        if(isset($_POST["create"])){
            $username = mysqli_real_escape_string($connection, $_POST["username"]);
            $email = mysqli_real_escape_string($connection, $_POST["email"]);
            $sql = "INSERT INTO tbuser (username, email) VALUES ('$username', '$email')";
            $isSuccess = $connection->query($sql);
            if($isSuccess){
                header("Location: read.php");
                exit();
            } else {
                $message = "Error: " . $connection->error;
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>CREATE USER</title>
</head>
<body>
    <div class="w-screen min-h-screen flex flex-col justify-center items-center space-y-7">
        <h2 class="text-5xl font-bold text-blue-600">CREATE USER</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="flex flex-col gap-5">
            <label for="username" class="text-2xl font-semibold">Username</label>
            <input required type="text" name="username" placeholder="username" class="text-xl py-4 px-8 outline outline-gray-600 rounded-lg">
            <label for="email" class="text-2xl font-semibold">Email</label>
            <input required type="email" name="email" placeholder="eg. example.gmail.com" class="text-xl py-4 px-8 outline outline-gray-600 rounded-lg">
            <button type="submit" name="create" class="hover:cursor-pointer focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-4 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-colors duration-300">Create User</button>
        </form>
    </div>
</body>
</html>