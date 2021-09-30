<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (Session::has('post_delete_error'))
        <div class="absolute bg-red-600 text-white px-4 py-2 rounded-md top-20 right-10">
            <p>{{ Session::get('post_delete_error') }}</p>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
                    Dashboard Post Show

                    <div class="flex items-center gap-4">
                        <a href="{{ route('dashboard.post.edit', ['post' => $post]) }}" class="bg-hulk-green hover:bg-hulk-green-600 text-white py-2 px-4 rounded-md">Edit Post</a>
                        <form action="{{ route('dashboard.post.destroy', ['post' => $post]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-600 hover:bg-red-800 text-white py-2 px-4 rounded-md">Delete Post</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="py-6 px-6">
                    <div>
                        <h3 class="text-lg">
                            Title: 
                            <a href="{{ route('dashboard.post.show', ['post' => $post->id]) }}" class="underline">
                                {{ $post->title }}
                            </a>
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

                    <div class="mt-4">
                        <div>
                            <h3 class="text-lg">Post comments: </h3>
                        </div>

                        @forelse ($post->comments as $comment)
                            <div class="mt-4 bg-gray-50 rounded-md px-4 py-2 border border-gray-300">
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
                        @empty
                            <p>Sorry, no comments available for this post!</p>
                        @endforelse
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
