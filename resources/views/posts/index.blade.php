@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-gray-900 mb-2">Latest Posts</h1>
    <p class="text-xl text-gray-600">Discover our newest articles and stories</p>
</div>

@if($posts->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <article class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden group">
                <!-- Card Header -->
                <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600 group-hover:from-blue-600 group-hover:to-purple-700 transition-all duration-300 flex items-center justify-center">
                    <div class="text-center text-white">
                        <h2 class="text-2xl font-bold line-clamp-3">{{ $post->title }}</h2>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-6">
                    <p class="text-gray-600 line-clamp-3 mb-4">
                        {{ Str::limit($post->text, 150) }}
                    </p>

                    <!-- Meta Information -->
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full">
                            Category {{ $post->category_id }}
                        </span>
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                    </div>

                    <!-- Read More Link -->
                    <a href="{{ route('posts.show', $post->id) }}" class="inline-block text-blue-600 font-semibold hover:text-blue-800 transition group-hover:translate-x-1 duration-200">
                        Read More →
                    </a>
                </div>
            </article>
        @endforeach
    </div>
@else
    <div class="text-center py-12">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m0 0h6m-6-6h-6m0 0H6" />
        </svg>
        <h3 class="mt-4 text-lg font-medium text-gray-900">No posts found</h3>
        <p class="mt-2 text-gray-600">Start by creating your first post!</p>
    </div>
@endif
@endsection
