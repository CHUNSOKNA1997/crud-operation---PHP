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
        <form action=<?php echo $_SERVER["REQUEST_METHOD"] ?> method="POST" class="flex flex-col items-center gap-5">
        
            <input type="text" name="username" placeholder="username" class="text-xl py-4 px-8 outline outline-gray-600 rounded-full font-semibold placeholder:font-normal">
            <input type="email" name="email" placeholder="eg. example.gmail.com" class="text-xl py-4 px-8 outline outline-gray-600 rounded-full font-semibold placeholder:font-normal">
            <button type="submit" class="bg-green-600 px-8 py-3 rounded-2xl text-white hover:cursor-pointer hover:bg-green-500 transition-corlors duration-300">Create</button>
        </form>
    </div>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $email = $_POST["email"];
    }