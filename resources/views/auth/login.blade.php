@extends('components.layout')

@section('title', 'Login')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Login</h1>
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <x-form-field class="sm:col-span-4">
            <x-form-label for="email">Email</x-form-label>
            <div class="mt-2">
                <x-form-input name="email" id="email" placeholder="test@test.com" type="email" :value="old('email')" required />

                <x-form-error name="email" />
            </div>
        </x-form-field>

        <x-form-field class="sm:col-span-4">
            <x-form-label for="password">Password</x-form-label>
            <div class="mt-2">
                <x-form-input name="password" id="password" placeholder="*********" type="password" required />

                <x-form-error name="password" />
            </div>
        </x-form-field>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit"
                    class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded leading-5 hover:text-gray-400 hover:bg-black focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-white active:text-red-700 transition ease-in-out duration-150 dark:bg-white dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800">
                login
            </button>
        </div>
    </form>
@endsection
