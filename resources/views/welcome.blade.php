<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-100">
        <div class="w-full h-screen bg-gray-100 relative p-0 m-0">
            <div class="fixed top-0 left-0 h-16 w-full bg-white border-b flex items-center justify-center border-gray-200 px-6">

                <div class="flex justify-between items-center w-full max-w-7xl">
                    <div>
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('storage/hulk-apps-logo-nav.jpg') }}" class="h-8">
                        </a>
                    </div>
    
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline hover:text-hulk-green-600">Dashboard</a>
                        @else
                            <div>
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline hover:text-hulk-green-600">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline hover:text-hulk-green-600">Register</a>
                                @endif
                            </div>
                        @endauth
                    @endif
                </div>

            </div>

            @if (Session::has('post_delete_error'))
                <div class="absolute bg-red-600 text-white px-4 py-2 rounded-md top-0 right-5">
                    <p>{{ Session::get('post_delete_error') }}</p>
                </div>
            @endif

            <div class="mt-24 flex items-center justify-center">
                <div class="w-full max-w-7xl">
                    @forelse ($posts as $post)
                        <div class="bg-white max-w-7xl w-full rounded-md">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                                <div class="py-6 px-6 flex flex-row justify-between">
                                    <div>
                                        <div>
                                            <h3 class="text-lg">
                                                Title: 
                                                <a href="{{ route('post.show', ['post' => $post->id]) }}" class="underline hover:text-hulk-green-600">
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                        </div>
    
                                        <div class="mt-4">
                                            <h3 class="text-lg">
                                                Created by: {{ $post->user->name }}
                                            </h3>
                                        </div>
                
                                        <div class="mt-4">
                                            <h3 class="text-lg">
                                                Date: {{ $post->created_at }}
                                            </h3>
                                        </div>
                
                                        <div class="mt-4">
                                            <a href="{{ route('post.show', ['post' => $post->id]) }}" class="text-lg underline hover:text-hulk-green-600">
                                                Description
                                            </a>
                
                                            {{-- <p class="mt-2">{{ $post->description }}</p> --}}
                                        </div>
                
                                        <div class="mt-4">
                                            <p>Comments: {{ $post->comments_count }}</p>
                                        </div>
                                    </div>

                                    @if (auth()->user() && $post->user_id === auth()->user()->id)
                                    <div class="flex items-start gap-4">
                                        <a href="{{ route('dashboard.post.edit', ['post' => $post]) }}" class="bg-hulk-green hover:bg-hulk-green-600 text-white py-2 px-4 rounded-md">Edit Post</a>

                                        <form action="{{ route('dashboard.post.destroy', ['post' => $post->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="bg-red-600 hover:bg-red-800 text-white py-2 px-4 rounded-md">Delete Post</button>
                                        </form>
                                    </div>
                                    @endif
                                </div>

                                
                            </div>
                        </div>
                    @empty
                        <div class="bg-white max-w-7xl w-full">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                                <div class="px-6 py-4">
                                    <h3 class="text-lg">Sorry, no posts have been created yet!</h3>
                                </div>
                            </div>
                        </div>
                    @endforelse

                    @if ($posts->links())
                        <div class="mt-6">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
