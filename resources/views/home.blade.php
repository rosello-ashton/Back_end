@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="space-y-16">
    <!-- Hero Section -->
    <section class="text-center py-20">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
            Welcome to Rosello
        </h1>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            A modern blogging platform built with Laravel. Share your thoughts, ideas, and stories with the world.
        </p>
        <div class="flex gap-4 justify-center">
            <a href="{{ route('blog') }}" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold">
                Read Articles
            </a>
            <a href="#" class="px-8 py-3 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition font-semibold">
                Learn More
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition">
            <div class="text-4xl mb-4">📝</div>
            <h3 class="text-xl font-bold mb-2">Easy Publishing</h3>
            <p class="text-gray-600">Write and publish articles with our intuitive editor. No technical knowledge required.</p>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition">
            <div class="text-4xl mb-4">🎨</div>
            <h3 class="text-xl font-bold mb-2">Beautiful Design</h3>
            <p class="text-gray-600">Modern, responsive design that looks great on all devices and screens.</p>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition">
            <div class="text-4xl mb-4">⚡</div>
            <h3 class="text-xl font-bold mb-2">Fast & Reliable</h3>
            <p class="text-gray-600">Lightning-fast loading times and rock-solid reliability for your blog.</p>
        </div>
    </section>

    <!-- Latest Posts Preview -->
    <section>
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Latest Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($latestPosts as $post)
                <article class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden">
                    <div class="h-32 bg-gradient-to-br from-blue-500 to-purple-600"></div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold mb-2 line-clamp-2">{{ $post->title }}</h3>
                        <p class="text-gray-600 text-sm line-clamp-2 mb-4">{{ $post->text }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 font-semibold hover:text-blue-800">
                            Read More →
                        </a>
                    </div>
                </article>
            @empty
                <p class="text-gray-600">No posts yet. Check back soon!</p>
            @endforelse
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('blog') }}" class="text-blue-600 font-semibold hover:text-blue-800 text-lg">
                View All Articles →
            </a>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg p-8 md:p-12 text-white text-center">
        <h2 class="text-3xl font-bold mb-4">Subscribe to Our Newsletter</h2>
        <p class="text-blue-100 mb-6">Get the latest articles delivered to your inbox.</p>
        <form class="flex gap-2 max-w-md mx-auto">
            <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-2 rounded-lg text-gray-900">
            <button type="submit" class="px-6 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition">
                Subscribe
            </button>
        </form>
    </section>
</div>
@endsection
