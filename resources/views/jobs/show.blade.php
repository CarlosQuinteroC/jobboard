@extends('components.layout')

@section('title', 'Job')

@section('content')
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>
    <p>{{ $job->body }}</p>

    @if (Auth::check() && Auth::id() === $job->user_id)
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </p>
        <p class="mt-6">
            <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
        </p>

        <form method="POST" action="{{ route('jobs.destroy', $job) }}" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endif
@endsection
