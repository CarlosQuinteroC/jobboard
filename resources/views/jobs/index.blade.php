@extends('components.layout')

@section('title', 'Jobs')

@section('content')

    <x-slot:heading>
        Job Listings
    </x-slot:heading>
<h1>Jobs page</h1>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $job->title }}</div>

                <div>
                    <strong>{{ $job['title'] }}:</strong> Pays {{ $job['description'] }} per year.
                </div>
            </a>
        @endforeach
    </div>

    {{ $jobs -> links ()}}

@endsection
