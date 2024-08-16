<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">

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

    <h1 class="text-2xl font-bold mb-4">Conditions</h1>
    <a href="{{ route('conditions.create') }}" class="mb-4 inline-block bg-green-500 text-white py-2 px-4 rounded">Create Condition</a>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conditions as $condition)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $condition->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $condition->name }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('conditions.edit', $condition->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</a>
                        <form action="{{ route('conditions.destroy', $condition->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
