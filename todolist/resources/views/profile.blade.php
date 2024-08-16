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
    <div class="profile-header">
        <h1>{{ isset($user) ? $user->login : Auth::user()->login }}'s Profile</h1>
        @if (isset($user))
            <p>Email: {{ $user->email }}</p>
        @else
            <p>Email: {{ Auth::user()->email }}</p>
        @endif
    </div>

    <div class="ads-container">
        <h2>Posts</h2>
        <div class="ads-list">
            @foreach ($ads as $ad)
                <div class="ad-item">
                    @if($ad->image)
                        <img src="{{ asset($ad->image) }}" alt="{{ $ad->title }}">
                    @else
                        <img src="https://via.placeholder.com/150" alt="No image available">
                    @endif
                    <div>
                        <h3>{{ $ad->title }}</h3>
                        <p>{{ $ad->description }}</p>
                      
                        <p>Location: {{ $ad->location->name }}</p>
                        <p>Category: {{ $ad->categorie->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination">
            {{ $ads->links() }}
        </div>
    </div>
@endsection
 