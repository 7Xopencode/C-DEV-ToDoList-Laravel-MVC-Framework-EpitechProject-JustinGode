<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
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
        <h1 class="text-2xl font-bold mb-6">Categories</h1>
        <a href="{{ route('categories.create') }}" class="mb-4 inline-block bg-green-500 text-white py-2 px-4 rounded">Create Category</a>
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $category->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</a>
                            <a href="{{ route('categories.show', $category->id) }}" class="bg-blue-500 text-white py-1 px-2 rounded">View</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
