<!DOCTYPE html>
<html lang="id" class="h-full bg-navy-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="view-transition" content="same-origin">
    <title>@yield('title', 'Autentikasi SEAPEDIA')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind and Alpine via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-navy-950 text-white antialiased overflow-x-hidden relative flex flex-col justify-center py-12 sm:px-6 lg:px-8">

    <!-- Full-screen Deep Dark Ocean Background with absolute dark overlay -->
    <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('{{ asset('images/auth-bg.png') }}');">
        <div class="absolute inset-0 bg-navy-950/90 backdrop-brightness-[0.3]"></div>
    </div>

    <!-- Centered Brand Logo (Top) -->
    <div class="relative z-10 sm:mx-auto sm:w-full sm:max-w-md text-center mb-8 animate-cinematic">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-0.5">
            <span class="font-black text-3xl tracking-tighter text-teal-400">SEA</span>
            <span class="font-light text-3xl tracking-tighter text-white">PEDIA</span>
        </a>
    </div>

    <!-- Centered Form Wrapper (No solid card, forms float directly on dark overlay) -->
    <div class="relative z-10 sm:mx-auto sm:w-full sm:max-w-lg px-6 sm:px-0 animate-cinematic delay-100">
        <!-- Flash Alert -->
        <x-alert />

        <div class="space-y-6">
            @yield('content')
        </div>
    </div>

</body>
</html>
