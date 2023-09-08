<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gradient-to-r from-indigo-800 to-purple-900 text-gray-800">
<a href="/admin" class="fixed top-0 left-0 z-10 flex items-center text-gray-300 hover:text-gray-400 p-4">
    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
</a>

<div class="max-w-md mx-auto p-6 bg-gray-800 bg-opacity-70 rounded-lg shadow-lg mt-16 text-gray-200">
    <h1 class="text-3xl font-semibold text-indigo-300 mb-6">User Management</h1>

    <div class="mb-8">
        <h2 class="text-lg font-semibold mb-4">Users in this Group:</h2>
        <ul class="space-y-2">
            <?php foreach ($users as $index => $user) {
                ?>
                <form method="get" action="/tasks">
                    <li class="flex items-center justify-between bg-gray-700 p-4 rounded">
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-300"></span><?= $user->username ?>
                            <span class="text-gray-300"></span>
                        </div>
                        <div class="flex space-x-2">
                            <a href="?delete=<?= $user->id ?>" class="text-red-300 hover:text-red-400 focus:outline-none">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </a>
                        </div>
                    </li>
                </form>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="max-w-md mx-auto p-6 bg-gray-800 bg-opacity-70 rounded-lg shadow-lg mt-16 text-gray-200">

    <div>
        <h2 class="text-lg font-semibold mb-4">Add User</h2>
        <form method="post" class="space-y-4" action="/group">
            <div>
                <label for="itemName" class="block text-sm font-medium text-gray-400 mb-1">Username:</label>
                <input type="text" id="itemName" name="username" class="mt-1 px-4 py-2 w-full border rounded-md bg-gray-700 text-gray-200">
            </div>
            <button type="submit" name="submit" value="add" class="bg-indigo-600 text-gray-200 px-4 py-2 rounded hover:bg-indigo-700 focus:outline-none">
                Add
            </button>
        </form>
    </div>
</div>
</body>
</html>
