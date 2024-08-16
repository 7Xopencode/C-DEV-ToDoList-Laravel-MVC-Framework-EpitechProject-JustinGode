<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
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
        <h1 class="text-2xl font-bold mb-6">Create User</h1>
        
        <form method="POST" action="{{ route('users.store') }}" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Login</label>
                <input type="text" name="login" required class="w-full mt-2 p-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">First Name</label>
                <input type="text" name="firstname" required class="w-full mt-2 p-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Last Name</label>
                <input type="text" name="lastname" required class="w-full mt-2 p-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Bio</label>
                <textarea name="bio" class="w-full mt-2 p-2 border rounded-lg"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Avatar</label>
                <input type="text" name="avatar" class="w-full mt-2 p-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" required class="w-full mt-2 p-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" required class="w-full mt-2 p-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Phone</label>
                <input type="text" name="phone" required class="w-full mt-2 p-2 border rounded-lg">
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create</button>
        </form>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>
