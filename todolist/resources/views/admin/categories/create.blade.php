<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-white text-xl font-bold">Admin Dashboard</a>
            <div>
                <a href="{{ route('users.index') }}" class="text-white mr-4">Users</a>
                <a href="{{ route('categories.index') }}" class="text-white mr-4">Categories</a>
                <a href="{{ route('conditions.index') }}" class="text-white mr-4">Conditions</a>
                <a href="{{ route('locations.index') }}" class="text-white mr-4">Locations</a>
                <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-white">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Create Category</h2>
        <form method="POST" action="{{ route('categories.store') }}" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" id="name" class="w-full mt-2 p-2 border rounded-lg" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create</button>
        </form>
        <a href="{{ route('categories.index') }}" class="mt-4 inline-block bg-gray-500 text-white py-2 px-4 rounded">Back to Categories</a>
    </div>
</body>
</html>
