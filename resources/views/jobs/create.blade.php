@extends('components.layout')

@section('title', 'Create')

@section('content')
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="{{ route('jobs.store') }}" >
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="title" id="title" placeholder="Director" required />

                            <x-form-error name="title" />
                        </div>
                    </x-form-field>
                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="body">Description</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="body" id="body" placeholder="Job description" required />

                            <x-form-error name="body" />
                        </div>
                    </x-form-field>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">

            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit"
                    class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded leading-5 hover:text-gray-400 hover:bg-black focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-white active:text-red-700 transition ease-in-out duration-150 dark:bg-white dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800">
                Save
            </button>
        </div>
    </form>
@endsection
