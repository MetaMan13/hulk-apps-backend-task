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

            @if (Session::has('comment_created'))
                <div class="absolute bg-hulk-green text-white px-4 py-2 rounded-md top-0 right-5">
                    <p>{{ Session::get('comment_created') }}</p>
                </div>
            @endif

            @if (Session::has('comment_deleted'))
                <div class="absolute bg-hulk-green text-white px-4 py-2 rounded-md top-0 right-5">
                    <p>{{ Session::get('comment_deleted') }}</p>
                </div>
            @endif

            @if (Session::has('post_delete_error'))
                <div class="absolute bg-red-600 text-white px-4 py-2 rounded-md top-0 right-5">
                    <p>{{ Session::get('post_delete_error') }}</p>
                </div>
            @endif

            <div class="mt-24 flex items-center justify-center">
                <div class="w-full max-w-7xl">
                    <div class="bg-white max-w-7xl w-full rounded-md">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                            <div class="py-6 px-6">
                                <div class="flex flex-row justify-between">
                                    <div>
                                        <div>
                                            <h3 class="text-lg">
                                                Title: 
                                                <a href="{{ route('dashboard.post.show', ['post' => $post->id]) }}" class="underline hover:text-hulk-green-600">
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
                                            <h3 class="text-lg">
                                                Description:
                                            </h3>
                
                                            <p class="mt-2">{{ $post->description }}</p>
                                        </div>
                                    </div>

                                    @if ($post->user_id === auth()->user()->id)
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

                                <div>
                                    <div class="mt-6 mb-8">
                                        <form action="{{ route('comment.store') }}" method="POST">
                                            @csrf
                                            @method('POST')

                                            <div class="flex flex-col">
                                                <label for="" class="text-lg">Leave a comment</label>

                                                <input type="hidden" name="post_id" value="{{ $post->id }}">

                                                <textarea name="body" id="" cols="30" rows="8" class="w-full resize-none block border border-gray-400 rounded-md focus:ring-hulk-green-50 focus:border-hulk-green mt-1"></textarea>
                                                
                                                @error('body')
                                                    <div class="mt-2">
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="flex mt-4">
                                                <button type="submit" class="w-full bg-hulk-green hover:bg-hulk-green-600 text-white rounded-md w-full text-center px-2 py-2">Comment Post</button>
                                            </div>
                                        </form>
                                    </div>

                                    @forelse ($post->comments as $comment)
                                        <div class="mt-4 bg-gray-50 rounded-md px-4 py-2 border border-gray-300 flex flex-row justify-between">
                                            <div>
                                                <div>
                                                    {{ $comment->user->name }}
                                                </div>
    
                                                <div class="mt-2">
                                                    {{ $comment->created_at }}
                                                </div>
    
                                                <div class="mt-2">
                                                    {{ $comment->body }}
                                                </div>
                                            </div>

                                            @if ($comment->user_id === auth()->user()->id)
                                                <form action="{{ route('comment.destroy', ['comment' => $comment->id]) }}" method="POST" class="flex items-center">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="w-full bg-red-600 hover:bg-red-800 text-white rounded-md w-full text-center px-2 py-2">Delete Comment</button>
                                                </form>
                                            @endif
                                        </div>
                                    @empty
                                        <p>Sorry, no comments available for this post!</p>
                                    @endforelse
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
