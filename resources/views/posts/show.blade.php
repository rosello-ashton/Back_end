@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Back Button -->
    <a href="{{ route('posts.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6 transition">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Posts
    </a>

    <!-- Post Header -->
    <article class="bg-white rounded-lg shadow-lg p-8 md:p-12">
        <!-- Post Meta -->
        <div class="mb-6 pb-6 border-b border-gray-200">
            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full font-semibold">
                    {{ $post->category->name ?? 'Category ' . $post->category_id }}
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                    </svg>
                    {{ $post->created_at->format('F d, Y') }}
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z" />
                    </svg>
                    Updated: {{ $post->updated_at->format('F d, Y') }}
                </span>
            </div>
        </div>

        <!-- Post Title -->
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
            {{ $post->title }}
        </h1>

        <!-- Post Image/Hero -->
        <div class="mb-8 h-96 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg overflow-hidden">
            <div class="w-full h-full flex items-center justify-center text-white">
                <svg class="w-24 h-24 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>

        <!-- Post Content -->
        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
            <p>{{ $post->text }}</p>
        </div>

        <!-- Post Footer -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button class="flex items-center text-gray-600 hover:text-red-500 transition">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        Like
                    </button>
                    <button class="flex items-center text-gray-600 hover:text-blue-500 transition">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C9.589 14.3 10 15.609 10 17c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8c1.391 0 2.702.411 3.816 1.179M16 11c4.418 0 8 3.582 8 8s-3.582 8-8 8-8-3.582-8-8c0-1.391.411-2.702 1.179-3.816m0 0a9 9 0 0117.632 0m0 0a9 9 0 01-17.632 0" />
                        </svg>
                        Share
                    </button>
                </div>
                <span class="text-gray-600">
                    <span class="font-semibold">5</span> minutes read
                </span>
            </div>
        </div>
    </article>

    <!-- Related Posts Section -->
    <div class="mt-16">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">More Posts</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- You can add related posts here -->
            <div class="bg-white rounded-lg shadow p-6 text-center text-gray-500">
                <p>More posts coming soon</p>
            </div>
        </div>
    </div>
</div>
@endsection
