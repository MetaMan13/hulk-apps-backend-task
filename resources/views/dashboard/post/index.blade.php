<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                    Dashboard Post Index

                    <div class="">
                        <a href="{{ route('dashboard.post.create') }}" class="bg-hulk-green hover:bg-hulk-green-600 text-white py-2 px-4 rounded-md">Create Post</a>
                    </div>
                </div>
            </div>

            @forelse ($posts as $post)
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
                            <p>Comments: {{ $post->comments_count }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="px-6 py-4">
                        <h3 class="text-lg">Sorry, you haven't created any posts yet!</h3>
                    </div>
                </div>
            @endforelse

            @if ($posts->links())
                <div class="mt-6 px-1">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
