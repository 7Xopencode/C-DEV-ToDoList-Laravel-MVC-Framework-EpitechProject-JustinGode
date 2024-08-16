<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
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
        <h1 class="text-2xl font-bold mb-6">Users</h1>
        <a href="{{ route('users.create') }}" class="mb-6 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create User</a>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">ID</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Login</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">First Name</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Last Name</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Email</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Phone</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b">
                            <td class="py-3 px-6">{{ $user->id }}</td>
                            <td class="py-3 px-6">{{ $user->login }}</td>
                            <td class="py-3 px-6">{{ $user->firstname }}</td>
                            <td class="py-3 px-6">{{ $user->lastname }}</td>
                            <td class="py-3 px-6">{{ $user->email }}</td>
                            <td class="py-3 px-6">{{ $user->phone }}</td>
                            <td class="py-3 px-6 flex space-x-2">
                                <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
