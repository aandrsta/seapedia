<!DOCTYPE html>
<html lang="id" class="h-full bg-sand-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard SEAPEDIA')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    
    <!-- Tailwind and Alpine via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans bg-sand-200 text-navy-800 antialiased flex" x-data="{ sidebarOpen: false }">

    <!-- Sidebar Component -->
    <x-sidebar />

    <!-- Content area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden min-h-screen">
        <!-- Top bar (mobile) -->
        <header class="flex items-center justify-between bg-navy-700 px-4 py-3 text-white lg:hidden">
            <div class="flex items-center gap-2">
                <span class="font-black text-xl tracking-tight text-teal-400">SEA</span>
                <span class="font-light text-xl tracking-tight text-white">PEDIA</span>
            </div>
            <button @click="sidebarOpen = true" class="p-1 rounded-md hover:bg-navy-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </header>

        <!-- Top navigation for desktop / dashboard headers -->
        <div class="bg-white border-b border-sand-300 px-6 py-4 flex items-center justify-between shadow-warm">
            <h1 class="text-xl font-bold text-navy-600">@yield('page_title', 'Dashboard')</h1>
            <div class="flex items-center gap-4">
                <!-- Role selector dropdown if user has multiple roles -->
                @if(auth()->check() && auth()->user()->roles->count() > 1)
                    <a href="{{ route('select-role') }}" class="btn btn-ghost btn-sm border border-sand-400 text-xs flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        Ganti Peran
                    </a>
                @endif
                
                <span class="text-xs bg-teal-500/10 text-teal-700 font-semibold px-2.5 py-1 rounded-full uppercase tracking-wider">
                    Peran Aktif: {{ session('active_role', 'none') }}
                </span>

                <div class="hidden sm:flex items-center gap-3 text-right border-l border-sand-300 pl-4">
                    <div>
                        <p class="text-sm font-bold text-navy-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-sand-500">{{ auth()->user()->email }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="p-2 text-sand-500 hover:text-coral-500 hover:bg-sand-100 rounded-full transition-colors" title="Keluar">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Flash Alert Component -->
        <div class="px-6 mt-4">
            <x-alert />
        </div>

        <!-- Dashboard Content -->
        <main class="flex-1 overflow-y-auto p-6 focus:outline-none">
            @yield('content')
        </main>
    </div>

    <!-- Toast Notification Container (Alpine.js) -->
    <div x-data class="fixed bottom-5 right-5 z-50 flex flex-col gap-2 max-w-sm w-full">
        <template x-for="msg in $store.toast.messages" :key="msg.id">
            <div x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 :class="{
                     'bg-emerald-500 text-white': msg.type === 'success',
                     'bg-coral-500 text-white': msg.type === 'error',
                     'bg-navy-600 text-white': msg.type === 'info'
                 }"
                 class="px-4 py-3 rounded-sea shadow-warm-lg flex items-center justify-between gap-3 text-sm font-semibold">
                <span x-text="msg.message"></span>
                <button @click="$store.toast.remove(msg.id)" class="text-white/80 hover:text-white focus:outline-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </template>
    </div>

    @stack('scripts')
</body>
</html>
