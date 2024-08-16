<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg mb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="{{ route('admin.dashboard') }}" class="flex-shrink-0 flex items-center text-xl font-bold text-blue-600">Admin Dashboard</a>
                </div>
                <div class="flex items-center">
                    <span class="mr-4 text-gray-600">Welcome, {{ auth()->guard('admin')->user()->login }}</span>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="text-white bg-red-500 hover:bg-red-700 font-semibold py-2 px-4 rounded">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('users.index') }}" class="block bg-blue-500 text-white text-center py-4 rounded-lg hover:bg-blue-600">Manage Users</a>
                <a href="{{ route('categories.index') }}" class="block bg-green-500 text-white text-center py-4 rounded-lg hover:bg-green-600">Manage Categories</a>
                <a href="{{ route('conditions.index') }}" class="block bg-yellow-500 text-white text-center py-4 rounded-lg hover:bg-yellow-600">Manage Conditions</a>
                <a href="{{ route('locations.index') }}" class="block bg-purple-500 text-white text-center py-4 rounded-lg hover:bg-purple-600">Manage Locations</a>
            </div>
        </div>
    </div>
</body>
</html>
