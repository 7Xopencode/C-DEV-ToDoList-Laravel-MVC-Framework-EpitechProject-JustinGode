@extends('layout')


@section('content')
    <div class="container mx-auto mt-10">
        <div class="ad-details bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold mb-4">{{ $ad->title }}</h2>
            <div class="ad-image mb-4">
                @if($ad->image)
                    <img src="{{ asset($ad->image) }}" alt="{{ $ad->title }}" class=" rounded w-32 h-32"> 
                    
                @else
                    <p>No image available</p>
                @endif
            </div>
           <!--  <p class="mb-4"><strong>Price:</strong> ${{ $ad->price }}</p> -->
            <!-- <p class="mb-4"><strong>Condition:</strong> {{ $ad->condition->name }}</p> -->
            <p class="mb-4"><strong>Location:</strong> {{ $ad->location->name }}</p>
            <p class="mb-4"><strong>Category:</strong> {{ $ad->categorie->name }}</p>
            <p class="mb-4"><strong>Description:</strong> {{ $ad->description }}</p>
            <p class="mb-4"><strong>Posted by:</strong> <a href="{{ route('user.profile', $ad->user->id) }}" class="text-blue-500">{{ $ad->user->login }}</a></p>
        </div>
    </div>
@endsection
