<header class="bg-white border-b border-sand-200 shadow-warm sticky top-0 z-40" x-data="{ mobileOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 gap-4">

            <!-- Logo -->
            <div class="flex items-center shrink-0">
                <a href="{{ route('home') }}" class="flex items-center gap-0.5">
                    <span class="font-black text-2xl tracking-tighter text-teal-600">SEA</span>
                    <span class="font-light text-2xl tracking-tighter text-navy-900">PEDIA</span>
                </a>
            </div>

            <!-- Search Bar (Desktop) -->
            <div class="flex-grow max-w-2xl hidden md:block">
                <form action="{{ route('products.index') }}" method="GET" class="relative group" id="navbar-search-form">
                    <input type="text" name="search" value="{{ request('search') }}"
                           id="navbar-search-input"
                           class="w-full bg-sand-50 border border-sand-200 text-navy-900 text-sm rounded-sea pl-5 pr-12 py-2.5 focus:bg-white focus:ring-2 focus:ring-teal-500/10 focus:border-teal-500 transition-all shadow-sm placeholder-sand-400 font-medium"
                           placeholder="Cari produk di SEAPEDIA...">
                    <button type="submit" id="navbar-search-btn" class="absolute right-1.5 top-1/2 -translate-y-1/2 p-2 bg-navy-900 rounded-sea text-white hover:bg-navy-800 transition-colors" aria-label="Cari">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>
            </div>

            <!-- Right Side: Cart + Auth -->
            <div class="flex items-center gap-4">

                <!-- Cart Icon (Always Visible) -->
                <a href="{{ auth()->check() ? '#' : route('login') }}" id="navbar-cart-btn" class="relative p-2 text-navy-800 hover:text-teal-600 transition-colors" title="Keranjang">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <span class="absolute -top-0.5 -right-0.5 w-4 h-4 bg-coral-500 text-white text-[9px] font-black rounded-sea flex items-center justify-center leading-none">0</span>
                </a>

                <!-- Divider -->
                <div class="w-px h-6 bg-sand-200"></div>

                @auth
                    <!-- Wallet Balance (Buyer only) -->
                    @if(session('active_role') === 'buyer' && auth()->user()->wallet)
                        <div class="hidden lg:flex items-center gap-1.5 bg-teal-50 text-teal-700 px-3 py-1.5 border border-teal-100 text-xs font-bold">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 12m18 0c0 .621-.504 1.125-1.125 1.125H3.375A1.125 1.125 0 012.25 12m18 0v1.5a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 13.5V12"></path></svg>
                            <span>Rp {{ number_format(auth()->user()->wallet->balance, 0, ',', '.') }}</span>
                        </div>
                    @endif

                    <!-- Active Role Badge -->
                    <span class="hidden sm:inline-flex items-center text-[9px] bg-navy-100 text-navy-800 px-2 py-0.5 uppercase tracking-widest font-black border border-navy-200">
                        {{ session('active_role') }}
                    </span>

                    <!-- Role Switch -->
                    @if(auth()->user()->roles->count() > 1)
                        <a href="{{ route('select-role') }}" class="p-1.5 text-navy-800 hover:text-teal-600 hover:bg-sand-50 transition-all" title="Pindah Peran">
                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"></path></svg>
                        </a>
                    @endif

                    <!-- Dashboard -->
                    @if(session('active_role'))
                        <a href="{{ route('dashboard.' . session('active_role')) }}" id="navbar-dashboard-btn" class="hidden sm:inline-flex btn btn-secondary btn-sm text-[10px] tracking-widest font-black">
                            DASHBOARD
                        </a>
                    @endif

                    <!-- Profile -->
                    <a href="{{ route('profile') }}" class="p-1.5 text-navy-800 hover:text-teal-600 hover:bg-sand-50 transition-all" title="Profil Saya">
                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path></svg>
                    </a>

                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="p-1.5 text-navy-800 hover:text-coral-500 hover:bg-sand-50 transition-all" title="Keluar">
                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"></path></svg>
                        </button>
                    </form>
                @else
                    <!-- Guest: Login + Register -->
                    <a href="{{ route('login') }}" id="navbar-login-btn" class="btn btn-ghost text-[10px] font-black uppercase tracking-widest border border-sand-300 hover:border-navy-900 text-navy-900">MASUK</a>
                    <a href="{{ route('register') }}" id="navbar-register-btn" class="btn btn-primary text-[10px] font-black uppercase tracking-widest">DAFTAR</a>
                @endauth

                <!-- Mobile Hamburger -->
                <button @click="mobileOpen = !mobileOpen" class="md:hidden p-2 text-navy-800 hover:text-teal-600 transition-colors" aria-label="Toggle menu">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path></svg>
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileOpen" x-cloak
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0 -translate-y-1"
         class="md:hidden bg-white border-t border-sand-200 shadow-warm-lg">
        <div class="px-4 py-4 space-y-3">
            <!-- Mobile Search -->
            <form action="{{ route('products.index') }}" method="GET">
                <input type="text" name="search" value="{{ request('search') }}"
                       class="w-full bg-sand-50 border border-sand-200 text-navy-900 text-sm rounded-sea pl-5 pr-4 py-2.5 focus:ring-2 focus:ring-teal-500/10 focus:border-teal-500 placeholder-sand-400 font-medium"
                       placeholder="Cari produk...">
            </form>

            <!-- Mobile Nav Links -->
            <div class="flex flex-col gap-1 pt-2">
                <a href="{{ route('products.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-xs font-black uppercase tracking-widest text-navy-900 hover:bg-sand-50 transition-colors">
                    <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                    Katalog Produk
                </a>
                @auth
                    @if(session('active_role'))
                        <a href="{{ route('dashboard.' . session('active_role')) }}" class="flex items-center gap-3 px-3 py-2.5 text-xs font-black uppercase tracking-widest text-navy-900 hover:bg-sand-50 transition-colors">
                            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"></path></svg>
                            Dashboard
                        </a>
                    @endif
                    <a href="{{ route('profile') }}" class="flex items-center gap-3 px-3 py-2.5 text-xs font-black uppercase tracking-widest text-navy-900 hover:bg-sand-50 transition-colors">
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path></svg>
                        Profil Saya
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 text-xs font-black uppercase tracking-widest text-coral-500 hover:bg-coral-50 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"></path></svg>
                            Keluar
                        </button>
                    </form>
                @else
                    <div class="flex gap-2 pt-2">
                        <a href="{{ route('login') }}" class="flex-1 btn btn-ghost text-[10px] font-black uppercase tracking-widest border border-sand-300 text-center">Masuk</a>
                        <a href="{{ route('register') }}" class="flex-1 btn btn-primary text-[10px] font-black uppercase tracking-widest text-center">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>
