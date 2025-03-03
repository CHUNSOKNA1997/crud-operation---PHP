<?php
    include "./database.php";
    $message = '';
        if(isset($_POST["create"])){
            $username = mysqli_real_escape_string($connection, $_POST["username"]);
            $email = mysqli_real_escape_string($connection, $_POST["email"]);
            $sql = "INSERT INTO tbuser (username, email) VALUES ('$username', '$email')";
            $isSuccess = $connection->query($sql);
            if($isSuccess){
                $message = "Successfully added to database";
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
    <title>Create User</title>
</head>
<body>
    <div class="w-screen min-h-screen flex flex-col justify-center items-center space-y-7">
        <h2 class="text-5xl font-semibold">Create User</h2>
        <?php if(!empty($message)): ?>
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">
                        <?php echo $message ?>
                    </span>
                </div>
                </div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="flex flex-col items-center gap-5">
            <input required type="text" name="username" placeholder="username" class="text-xl py-4 px-8 outline outline-gray-600 rounded-full">
            <input required type="email" name="email" placeholder="eg. example.gmail.com" class="text-xl py-4 px-8 outline outline-gray-600 rounded-full">
            <button name="create" type="submit" class="bg-green-600 px-8 py-3 rounded-2xl text-white hover:cursor-pointer hover:bg-green-500 transition-colors duration-300">Create</button>
        </form>
    </div>
</body>
</html>