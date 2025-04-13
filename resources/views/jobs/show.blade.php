@extends('components.layout')

@section('title', 'Job')

@section('content')
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>
    <p>{{ $job->body }}</p>
    <p class="mt-2 text-sm text-gray-600">Posted by: {{ $job->poster->name }} on {{ $job->created_at->format('M d, Y') }}</p>
    @if (Auth::check())
        <form method="POST" action="{{ route('jobs.interest.toggle', $job) }}">
            @csrf
            <button type="submit" class="mt-4 px-4 py-2 rounded
                @if ($job->interestedUsers->contains(Auth::id()))
                    bg-red-500
                @else
                    bg-blue-500
                @endif text-white">
                @if ($job->interestedUsers->contains(Auth::id()))
                    Remove Interest
                @else
                    Mark as Interested
                @endif
            </button>
        </form>
    @endif

    <!-- If is the owner / poster, display the list of interested users -->
    @if (Auth::check() && Auth::id() === $job->user_id)
        <div class="mt-8">
            <h2 class="text-xl font-semibold">Interested Users</h2>
            <ul class="list-disc ml-5 mt-2">
                @foreach ($job->interestedUsers as $interestedUser)
                    <li>{{ $interestedUser->name }} ({{ $interestedUser->email }})</li>
                @endforeach
            </ul>
        </div>
        @endif


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
