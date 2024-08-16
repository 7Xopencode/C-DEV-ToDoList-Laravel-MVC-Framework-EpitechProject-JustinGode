<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-8">
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
    <br>
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <h2 class="text-2xl font-bold mb-2">Category Details</h2>
            <div class="mb-4">
                <p class="text-gray-700"><strong>ID:</strong> {{ $category->id }}</p>
                <p class="text-gray-700"><strong>Name:</strong> {{ $category->name }}</p>
            </div>
            <a href="{{ route('categories.index') }}" class="text-blue-500 hover:underline">Back to Categories</a>
        </div>
    </div>
</body>
</html>
