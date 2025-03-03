<?php
    include "./database.php";

    function getUserData($connection, $uid){
        $sql = "SELECT * FROM tbuser 
                WHERE id = '$uid'";

        $result = $connection->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return [
                'username' => $row['username'],
                'email' => $row['email']
            ];
        }
        return null;
    }

    function updateUser($connection, $uid, $username, $email){
        $sql = "UPDATE tbuser
                SET username = '$username', email = '$email'
                WHERE id = '$uid'";

        $isSuccess = $connection->query($sql);
        return $isSuccess;
    }

    // Initialize variables
    $username = '';
    $email = '';
    $updateMessage = '';

    if(isset($_POST['update']) && isset($_GET['id'])) {
        $uid = $_GET['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        
        $isSuccess = updateUser($connection, $uid, $username, $email);
        
        if($isSuccess) {
            $updateMessage = "User updated successfully!";
        } else {
            $updateMessage = "Failed to update user: " . $connection->error;
        }
    }
    // Get user data (for initial form load or after update)
    elseif(isset($_GET['id'])) {
        $uid = $_GET['id'];
        $userData = getUserData($connection, $uid);

        if($userData) {
            $username = $userData['username'];
            $email = $userData['email'];
        } else {
            // If user data is not found
            $updateMessage = "User not found.";
        }
    } else {
        // Handle the case where 'id' is not set
        $updateMessage = "User ID is not provided.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>UPDATE USER</title>
</head>
<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <svg class="mx-auto w-auto" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user-round"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Update User</h2>
            <?php if($updateMessage): ?>
            <p class="mt-2 text-center <?php echo strpos($updateMessage, 'success') !== false ? 'text-green-600' : 'text-red-600'; ?>">
                <?php echo $updateMessage; ?>
            </p>
            <?php endif; ?>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>" method="POST">
            <div>
                <label for="username" class="block text-sm/6 font-medium text-gray-900">Username</label>
                <div class="mt-2">
                    <input value="<?php echo htmlspecialchars($username); ?>" type="text" name="username" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                </div>
                <div class="mt-2">
                    <input value="<?php echo htmlspecialchars($email); ?>" type="email" name="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
            </div>
            <div>
                <button type="submit" name="update" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:cursor-pointer hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update User</button>
            </div>
            </form>
        </div>
    </div>
</body>
</html>