<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="view-transition" content="same-origin">
    <title>@yield('title', 'SEAPEDIA - Marketplace Multi-Peran')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind and Alpine via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen font-sans bg-sand-200 text-navy-800 antialiased">

    <!-- Navbar Component -->
    <x-navbar />

    <!-- Flash Alert Component -->
    <x-alert />

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

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Component -->
    <x-footer />

    @stack('scripts')
</body>
</html>
