@extends('components.layout')

@section('title', $job->title)

@section('content')
    <x-slot:heading>{{ $job->title }}</x-slot:heading>

    {{-- Card Container --}}
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        {{-- Job Header --}}
        <div class="px-6 py-4 border-b">
            <h2 class="text-2xl font-bold text-gray-900">{{ $job->title }}</h2>
            <p class="mt-1 text-sm text-gray-600">
                Posted by {{ $job->poster->name }} on {{ $job->created_at->format('M d, Y') }}
            </p>
        </div>

        {{-- Job Body --}}
        <div class="px-6 py-4">
            <p class="text-gray-700 leading-relaxed">{{ $job->body }}</p>
        </div>

        {{-- Actions (Interest, Edit/Delete) --}}
        @auth
            <div class="px-6 py-4 border-t flex flex-wrap gap-3">
                @php $interested = $job->interestedUsers->contains(auth()->id()); @endphp

                {{-- Interest Toggle --}}
                <form method="POST" action="{{ route('jobs.interest.toggle', $job) }}">
                    @csrf
                    <button
                        type="submit"
                        class="px-4 py-2 rounded text-white {{ $interested ? 'bg-red-500 hover:bg-red-600' : 'bg-blue-500 hover:bg-blue-600' }}">
                        {{ $interested ? 'Remove Interest' : 'Mark as Interested' }}
                    </button>
                </form>

                {{-- Poster‑Only Actions --}}
                @if(auth()->id() === $job->user_id)
                    <a
                        href="{{ route('jobs.edit', $job) }}"
                        class="px-4 py-2 rounded bg-green-500 hover:bg-green-600 text-white">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('jobs.destroy', $job) }}">
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-white">
                            Delete
                        </button>
                    </form>
                @endif
            </div>
        @endauth

        {{-- Interested Users List --}}
        @if(auth()->check() && auth()->id() === $job->user_id)
            @php
                $count = $job->interestedUsers->count();
            @endphp
            <div class="px-6 py-4 border-t bg-gray-50">
                <h3 class="text-lg font-semibold mb-2">
                    Interested Users ({{ $count }})
                </h3>                <ul class="list-disc list-inside space-y-1">
                    @forelse($job->interestedUsers as $user)
                        <li>{{ $user->name }} &lt;{{ $user->email }}&gt;</li>
                    @empty
                        <li class="text-gray-500">No one has expressed interest yet.</li>
                    @endforelse
                </ul>
            </div>
        @endif
    </div>
@endsection
