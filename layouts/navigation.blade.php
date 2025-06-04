<nav x-data="{ open: false }" class="bg-white border-b shadow-sm">
    <div class="w-full px-4">
        <div class="flex justify-between h-16 items-center">
            @auth
                @php

                    $user = Auth::user();
                    $rutaIndex = match($user->rol) {
                        'RRHH' => route('rrhh.index'),
                        'Sistemas' => route('sistemas.index'),
                        'Jefe' => route('jefe.index'),
                        'Admin' => route('admin.index'),
                        default => route('home'),
                    };
                @endphp

                <div class="shrink-0 flex items-center text-xl font-semibold text-gray-800 mr-8">
                    <a href="{{ $rutaIndex }}">Fluxis</a>
                </div>
            @endauth

            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 8l5 5 5-5"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
