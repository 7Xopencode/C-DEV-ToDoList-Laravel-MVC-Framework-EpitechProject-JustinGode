@extends('layout')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Profile</h2>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="login" class="block text-gray-700">Login</label>
                <input type="text" name="login" value="{{ auth()->user()->login }}" class="w-full border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="firstname" class="block text-gray-700">First Name</label>
                <input type="text" name="firstname" value="{{ auth()->user()->firstname }}" class="w-full border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="lastname" class="block text-gray-700">Last Name</label>
                <input type="text" name="lastname" value="{{ auth()->user()->lastname }}" class="w-full border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="bio" class="block text-gray-700">Bio</label>
                <textarea name="bio" class="w-full border-gray-300 rounded-lg">{{ auth()->user()->bio }}</textarea>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Phone</label>
                <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="w-full border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="avatar" class="block text-gray-700">Avatar</label>
                <input type="file" name="avatar" class="w-full border-gray-300 rounded-lg">
                @if (auth()->user()->avatar)
                    <img src="{{ asset(auth()->user()->avatar) }}" alt="Avatar" class="mt-4 w-24 h-24 rounded-full">
                @endif
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Profile</button>
            </div>
        </form>
    </div>
</div>
@endsection
