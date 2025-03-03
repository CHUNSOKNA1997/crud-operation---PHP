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
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <svg class="mx-auto w-auto" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user-round"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create User</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div>
                <label for="username" class="block text-sm/6 font-medium text-gray-900">Username</label>
                <div class="mt-2">
                    <input type="text" name="username" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                </div>
                <div class="mt-2">
                    <input type="email" name="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
            </div>
            <div>
                <button type="submit" name="create" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:cursor-pointer hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create User</button>
            </div>
            </form>
        </div>
    </div>
</body>
</html>