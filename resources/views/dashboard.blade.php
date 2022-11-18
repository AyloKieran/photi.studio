<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    You're logged in!

                    {{ auth()->user() }}

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button>Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
