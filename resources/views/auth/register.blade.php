@extends('components.layout')

@section('title', 'Register')

@section('content')
    <form method="POST"  action="{{ route('register') }}">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Register a new user</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="name">Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="name" id="name" value="{{ old('name') }}" placeholder="Benito" required />

                            <x-form-error name="name" />
                        </div>
                    </x-form-field>
                    <!-- Role Selection as a native select element -->
                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="role">Role</x-form-label>
                        <div class="mt-2">
                            <select name="role" id="role" class="border p-2 rounded w-full">
                                <option value="poster" {{ old('role') == 'poster' ? 'selected' : '' }}>Poster</option>
                                <option value="viewer" {{ old('role') == 'viewer' ? 'selected' : '' }}>Viewer</option>
                            </select>
                            <x-form-error name="role" />
                        </div>
                    </x-form-field>


                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" placeholder="test@test.com" value="{{ old('email') }}" type="email" required />

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

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="password_confirmation ">Password confirmation</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password_confirmation" id="password_confirmation" placeholder="*********" type="password" required />

                            <x-form-error name="password_confirmation" />
                        </div>
                    </x-form-field>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
@endsection
