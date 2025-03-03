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
            <a href="create.php" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-colors duration-300">Create User</a>
        </div>
        <div class="overflow-x-auto shadow-md rounded-lg m-10 w-full xl:w-1/2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo $row["id"]; ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?php echo $row["username"]; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row["email"]; ?>
                                </td>
                                <td class="py-4 flex flex-col xl:flex-row">
                                    <a href="edit.php?id=<?php echo $row["id"]; ?>" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-colors duration-300">Edit</a>
                                    <a href="delete.php?id=<?php echo $row["id"]; ?>" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 transition-colors duration-300">Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
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