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
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Log in</x-form-button>
        </div>    </form>
@endsection
