<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session()->has('success'))
                        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 "
                            role="alert">
                            <div>
                                <span class="font-medium">{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('posts.update', $post) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-4">
                            <label for="title"
                                class="block text-sm font-medium text-gray-900 dark:text-gray-900">Title</label>
                            <input type="text" value="{{ $post->title }}" id="title" name="title"
                                class="mt-1 p-2 border border-gray-900 dark:border-gray-600 rounded-md w-full" required>
                            @error('title')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="body"
                                class="block text-sm font-medium text-gray-900 dark:text-gray-900">Body</label>
                            <textarea id="body" name="body" rows="4"
                                class="mt-1 p-2 border border-gray-900 dark:border-gray-600 rounded-md w-full" required>{{ $post->body }}</textarea>
                            @error('body')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="bg-gray-900  text-white  px-4 py-2 rounded-md hover:bg-gray-600">Update</button>
                        <a href="{{ route('posts.index') }}"
                            class="bg-gray-900  text-white py-2 px-4 rounded-md hover:bg-gray-600">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
