<x-app-layout>
    <div class="container">
        <h1>Welcome, Admin</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-primary-button class="mt-4">
                {{ __('Logout') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
