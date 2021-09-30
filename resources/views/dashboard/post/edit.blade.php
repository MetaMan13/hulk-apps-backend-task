<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Dashboard Post Edit
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 py-4 px-6 flex flex-col">
                <form action="{{ route('dashboard.post.update', ['post' => $post]) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{ $post->title }}" class="w-full border border-gray-400 rounded-md focus:ring-hulk-green-50 focus:border-hulk-green mt-1">

                        @error('title')
                            <div class="mt-1">
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class="flex flex-col mt-4">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="w-full resize-none block border border-gray-400 rounded-md focus:ring-hulk-green-50 focus:border-hulk-green mt-1">{{ $post->description }}</textarea>

                        @error('description')
                            <div class="mt-1">
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-8 flex flex-row w-full gap-4">
                        <a href="{{ route('dashboard.post.index') }}" class="bg-red-600 hover:bg-red-800 text-white rounded-md w-full text-center px-2 py-2">Cancel</a>
                        <button type="submit" class="w-full bg-hulk-green hover:bg-hulk-green-600 text-white rounded-md w-full text-center px-2 py-2">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
