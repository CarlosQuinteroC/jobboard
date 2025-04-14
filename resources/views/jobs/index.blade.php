@extends('components.layout')

@section('title', 'Jobs')

@section('content')

    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-black">Jobs<span class="text-red-700 ">Board</span></h1>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 mb-3">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 hover:text-red-700" >{{ $job['title'] }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $job['body'] }}.</p>
            </a>
        @endforeach
    </div>

    {{ $jobs -> links ()}}

@endsection
