<x-app-layout>
    <div class="container">
        @if (Auth::user()->role === 'admin')
            <h1>Welcome, Admin</h1>
            <p>Administrator area</p>
        @elseif (Auth::user()->role === 'teacher')
            <h1>Welcome, teacher</h1>
            <p>teacher area</p>
        @elseif (Auth::user()->role === 'student')
            <h1>Welcome, student</h1>
            <p>Student area</p>
        @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-primary-button class="mt-4">
                {{ __('Logout') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
