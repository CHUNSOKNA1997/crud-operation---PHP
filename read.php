<?php
    include "./database.php";
    $sql = "SELECT * FROM tbuser";
    $result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>READ USER</title>
</head>
<body>
    <main class="flex flex-col justify-center items-center mt-10 lg:mx-0 mx-3">
        <div class="w-full xl:w-1/2 flex justify-between items-center">
            <h2 class="text-3xl font-semibold">READ USER FROM DATABASE</h2>
            <a href="create.php" class="focus:outline-none text-white bg-indigo-600 hover:bg-indigo-500 px-6 py-2.5 transition-colors duration-300 rounded-xl">Add User</a>
        </div>
        <div class="overflow-x-auto m-10 w-full xl:w-1/2">
            <table class="w-full text-sm text-gray-600 text-left">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){ ?>
                            <tr class="bg-white border-b border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <?php echo $row["id"]; ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?php echo $row["username"]; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row["email"]; ?>
                                </td>
                                <td class="ml-0 xl:ml-5 space-y-2 xl:space-y-0 py-4 flex flex-col xl:flex-row space-x-4">
                                    <a href="edit.php?id=<?php echo $row["id"]; ?>" class="text-center text-indigo-600 hover:text-indigo-500 hover:underline transition-colors duration-300">Edit</a>
                                    <a href="delete.php?id=<?php echo $row["id"]; ?>" class="text-center text-red-600 hover:text-red-500 hover:underline transition-colors duration-300">Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr class="bg-white border-gray-200">
                            <td colspan="4" class="px-6 py-4 text-center">
                                No users found in the database.
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>