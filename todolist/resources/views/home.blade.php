@extends('layout')

@section('style')
    <style>
        .card_ad {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card_ad:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .card_ad img {
            object-fit: cover;
            height: 200px;
            width: 100%;
        }

        .title a {
            text-decoration: none;
        }

        .title a:hover {
            text-decoration: underline;
        }

        .filter-section {
            background-color: #f3f4f6;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .filter-section h2 {
            margin-bottom: 10px;
            font-size: 1.5rem;
            color: #111827;
        }

        .filter-section form input[type="search"] {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 1rem;
        }

        .filter-section form button {
            background-color: #2563eb;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .filter-section form button:hover {
            background-color: #1d4ed8;
        }

        .content{
            height: 75vh;
            overflow: hidden;
        }

        .all_abs{
            height: 100%;
            overflow: scroll;
        }

        .all_abs img{
            height: 355px;
        }
        .card_ad .title{
            text-transform: uppercase
        }
        .index_info{
            display: grid;
            grid-template-columns: auto auto ;
        }

    </style>
@endsection

@section('content')

    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-10">
        <a href="{{ route('ad.create') }}">Add</a>
    </button>

    <div class="content flex gap-10 mb-12 " >
        <div class=" w-[20%] treeBlock  bg-slate-300 rounded-lg p-4 pt-10">
            <form action="" action="{{ route('home') }}" method="GET" class="mt-10">

                <label for="categorie" class="block mb-4 text-xl font-medium text-gray-900 dark:text-white">Select a
                    categorie</label>
                <select id="categorie" name="categorie"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:text-text pl-5 mb-6 dark:focus:ring-blue-500 dark:focus:border-blue-500 ">

                    <option selected value=""></option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                    @endforeach


                </select>

                <label for="location" class="block mb-4 text-xl font-medium text-gray-900 dark:text-white">Select a
                    location</label>
                <select id="location" name="location"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:text-text pl-5 mb-6 dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-placeholder="chose a location">
                    <option selected value=""></option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach


                </select>



           

                <div class="flex justify-center">
                    <button type="submit"
                    class="text-white  end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>

        <div class="all_abs w-[75%] adblock grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-010 rounded-lg p-6 " >
            @foreach ($posts as $post)
                <div class="card_ad bg-gray-200 p-6 rounded-lg shadow-md">
                    @if($post->image)
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full rounded-lg mb-4">
                    @endif
                    <div class="title mb-5 text-left text-4xl text-black">
                        <a href="{{ route('ad.show', $post->id) }}" class="text-blue-600">{{ $post->title }}</a>
                    </div>
                    <div class="descriptions text-black">{{ substr($post->description, 0, 100)."..."  }}</div>
                    <div class="price text-black text-3xl mt-2" >{{ $post->price }} -- </div>
                    <div class="index_info  justify-between items-center mt-4">
                        <div class="category text-black">{{ $post->categorie->name }}</div>
                     
                        <div class="location text-black">{{ $post->location->name }}</div>
                        <div class="mt-2 user text-black">
                            <a href="{{ route('user.profile', $post->user->id) }}" class="underline">{{ $post->user->login }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
