@extends('layout')

@section('style')
    <style>
        .profile-header {
            background-color: #f3f4f6;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        .profile-header h1 {
            font-size: 1.875rem; /* 3xl */
            font-weight: 700; /* bold */
        }
        .profile-header p {
            font-size: 1.125rem; /* lg */
        }
        .ads-container {
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .ads-container h2 {
            font-size: 1.5rem; /* 2xl */
            font-weight: 700; /* bold */
            margin-bottom: 1rem; /* 4 */
        }
        .ad-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }
        .ad-item:last-child {
            border-bottom: none;
        }
        .ad-item img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 0.5rem;
        }
        .ad-item h3 {
            font-size: 1.25rem; /* xl */
            font-weight: 600; /* semibold */
        }
        .ad-item p {
            margin-top: 0.25rem; /* 1 */
            font-size: 1rem; /* base */
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 1.5rem; /* 6 */
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex items-center">

                <div class="w-24 h-24">
                    <img src="{{asset('storage/' . auth()->user()->avatar)}}" alt="Avatar" class="w-full h-full rounded-full object-cover">
                </div>

                <div class="ml-6">
                    <h2 class="text-2xl font-semibold">{{ auth()->user()->login }}</h2>
                    <p>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>
                    <p class="text-gray-600">{{ auth()->user()->bio }}</p>
                    <p>{{ auth()->user()->email }}</p>
                    <p>{{ auth()->user()->phone }}</p>
                    <a href="{{ route('profile.edit') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded">Edit Profile</a>
                    <a href="{{ route('ad.create') }}" class="mt-4 inline-block bg-gray-500 text-white py-2 px-4 rounded">Add Post</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="mt-4 inline-block bg-red-500 text-white py-2 px-4 rounded"type="submit">LOGOUT</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h3 class="text-xl font-semibold mb-4">My Posts</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                @foreach($ads as $ad)
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        @if($ad->image)
                            <img src="{{ asset($ad->image) }}" alt="{{ $ad->title }}" class="w-full h-48 object-cover rounded-t-lg mb-4">
                        @else
                            <img src="https://via.placeholder.com/150" alt="No image available" class="w-full h-48 object-cover rounded-t-lg mb-4">
                        @endif
                        <h4 class="text-lg font-semibold">{{ $ad->title }}</h4>
                        <p class="text-gray-600">{{ $ad->description }}</p>
                      
                        <p>Location: {{ $ad->location->name }}</p>
                        <p>Category: {{ $ad->categorie->name }}</p>
                        <div class="flex space-x-2 mt-4">
                            <a href="{{ route('ad.edit', $ad->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded">Edit</a>
                            <form action="{{ route('ad.destroy', $ad->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 pagination">
                {{ $ads->links() }}
            </div>
        </div>
    </div>
@endsection
