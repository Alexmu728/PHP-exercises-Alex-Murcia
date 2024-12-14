<x-guest-layout>
    <div class="max-w-lg mx-auto text-center">
        <h2 class="text-2xl font-semibold mb-4">Bienvenido a la aplicación</h2>

        <div class="mb-4">
            <a href="{{ route('login') }}">
                <x-primary-button>
                    {{ __('Login') }}
                </x-primary-button>
            </a>
        </div>

        <div class="mb-4">
            <a href="{{ route('register') }}">
                <x-primary-button>
                    {{ __('Register') }}
                </x-primary-button>
            </a>
        </div>
    </div>
</x-guest-layout>
