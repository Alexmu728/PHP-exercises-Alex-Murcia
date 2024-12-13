<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Mensaje genérico -->
                    {{ __("You're logged in!") }}

                    <!-- Contenido específico según el rol -->
                    @if(auth()->user()->role === 'admin')
                        <p class="mt-4 text-green-600">Welcome, Administrator! You have full access to the system.</p>
                    @elseif(auth()->user()->role === 'teacher')
                        <p class="mt-4 text-blue-600">Welcome, Teacher! Here’s your exclusive dashboard.</p>
                    @else
                        <p class="mt-4 text-red-600">Welcome, Student! Enjoy your learning journey.</p>
                    @endif

                    <!-- Contenido exclusivo para administradores y profesores -->
                    @if(in_array(auth()->user()->role, ['admin', 'teacher']))
                        <div class="mt-6 p-4 bg-gray-100 border rounded">
                            <h3 class="font-bold text-lg">Exclusive Section</h3>
                            <p>This content is visible only to Administrators and Teachers.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
