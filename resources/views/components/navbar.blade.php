<header class="bg-white border-b border-sand-200 shadow-warm sticky top-0 z-40" x-data="{ mobileOpen: false, profileOpen: false }">
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
            <div class="flex items-center gap-3">

                <!-- Cart Icon (Always Visible) -->
                <a href="{{ auth()->check() ? '#' : route('login') }}" id="navbar-cart-btn" class="relative p-2 text-navy-800 hover:text-teal-600 transition-colors" title="Keranjang">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <span class="absolute -top-0.5 -right-0.5 w-4 h-4 bg-coral-500 text-white text-[9px] font-black rounded-sea flex items-center justify-center leading-none">0</span>
                </a>

                @auth
                    <!-- Profile Avatar Trigger (with dropdown) -->
                    <div class="relative" x-data @click.outside="profileOpen = false">
                        <button
                            id="navbar-profile-btn"
                            @click="profileOpen = !profileOpen"
                            :class="profileOpen ? 'ring-2 ring-teal-400 ring-offset-2 scale-105' : 'hover:scale-105'"
                            class="flex items-center justify-center w-8 h-8 rounded-full overflow-hidden bg-gradient-to-br from-teal-400 to-teal-600 text-white font-extrabold text-[11px] shadow-warm-sm border border-teal-300 transition-all duration-150 shrink-0 cursor-pointer focus:outline-none"
                            title="Profil Saya"
                            aria-haspopup="true"
                            :aria-expanded="profileOpen"
                        >
                            @if(auth()->user()->avatar_url)
                                <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-full h-full object-cover">
                            @else
                                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                            @endif
                        </button>

                        <!-- Profile Dropdown Panel -->
                        <div
                            x-show="profileOpen"
                            x-cloak
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                            class="absolute right-0 top-full mt-3 w-64 bg-white rounded-[16px] shadow-[0_20px_60px_rgba(11,19,43,0.15)] border border-sand-200 overflow-hidden z-50"
                        >
                            <!-- User Info Header -->
                            <div class="px-4 py-4 bg-gradient-to-br from-teal-600 to-teal-700 relative overflow-hidden">
                                <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 16px 16px;"></div>
                                <div class="relative flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full overflow-hidden bg-white/20 backdrop-blur-sm border border-white/30 flex items-center justify-center font-black text-white text-sm shrink-0">
                                        @if(auth()->user()->avatar_url)
                                            <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-full h-full object-cover">
                                        @else
                                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-white font-black text-sm leading-tight truncate">{{ auth()->user()->name }}</p>
                                        <p class="text-teal-100 text-[10px] font-medium truncate"> {{ '@' . auth()->user()->username }}</p>
                                    </div>
                                </div>
                                @if(session('active_role'))
                                    <div class="relative mt-3">
                                        <span class="inline-flex items-center gap-1 text-[9px] font-black uppercase tracking-widest bg-white/20 text-white border border-white/20 px-2 py-0.5 rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-teal-300 inline-block"></span>
                                            {{ session('active_role') }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Menu Items -->
                            <div class="py-2">
                                @if(session('active_role') == "buyer")
                                <!-- Lihat Profil -->
                                <a href="{{ route('profile') }}"
                                   @click="profileOpen = false"
                                   class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-navy-800 hover:bg-sand-50 hover:text-teal-700 transition-colors group">
                                    <span class="w-8 h-8 rounded-[10px] bg-sand-100 group-hover:bg-teal-100 flex items-center justify-center transition-colors shrink-0">
                                        <svg class="w-4 h-4 text-navy-600 group-hover:text-teal-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="leading-tight">Lihat Profil</p>
                                        <p class="text-[10px] font-medium text-sand-400 mt-0.5">Kelola akun & kemitraan</p>
                                    </div>
                                </a>

                                <!-- Riwayat Pesanan -->
                                <a href="#"
                                   @click="profileOpen = false"
                                   class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-navy-800 hover:bg-sand-50 hover:text-teal-700 transition-colors group">
                                    <span class="w-8 h-8 rounded-[10px] bg-sand-100 group-hover:bg-teal-100 flex items-center justify-center transition-colors shrink-0">
                                        <svg class="w-4 h-4 text-navy-600 group-hover:text-teal-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="leading-tight">Riwayat Pesanan</p>
                                        <p class="text-[10px] font-medium text-sand-400 mt-0.5">Lacak & kelola pesanan</p>
                                    </div>
                                </a>
                                @endif


                                @if(in_array(session('active_role'), ['seller', 'driver', 'admin']))
                                <!-- Dashboard -->
                                <a href="{{ route('dashboard.' . session('active_role')) }}"
                                   @click="profileOpen = false"
                                   class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-navy-800 hover:bg-sand-50 hover:text-teal-700 transition-colors group">
                                    <span class="w-8 h-8 rounded-[10px] bg-sand-100 group-hover:bg-teal-100 flex items-center justify-center transition-colors shrink-0">
                                        <svg class="w-4 h-4 text-navy-600 group-hover:text-teal-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="leading-tight">Dashboard</p>
                                        <p class="text-[10px] font-medium text-sand-400 mt-0.5">Panel {{ ucfirst(session('active_role')) }}</p>
                                    </div>
                                </a>
                                @endif

                                <!-- Divider -->
                                <div class="mx-4 my-1 border-t border-sand-100"></div>

                                <!-- Logout -->
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="w-full flex items-center gap-3 px-4 py-3 text-xs font-bold text-coral-600 hover:bg-coral-50 transition-colors group">
                                        <span class="w-8 h-8 rounded-[10px] bg-coral-50 group-hover:bg-coral-100 flex items-center justify-center transition-colors shrink-0">
                                            <svg class="w-4 h-4 text-coral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                            </svg>
                                        </span>
                                        <div>
                                            <p class="leading-tight">Keluar</p>
                                            <p class="text-[10px] font-medium text-coral-400 mt-0.5">Akhiri sesi ini</p>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Role Switch -->
                    @if(auth()->user()->roles->count() > 1)
                        <a href="{{ route('select-role') }}" class="p-1.5 text-navy-800 hover:text-teal-600 hover:bg-sand-50 transition-all" title="Pindah Peran">
                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"></path></svg>
                        </a>
                    @endif

                  

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
                    @if(in_array(session('active_role'), ['seller', 'driver', 'admin']))
                        <a href="{{ route('dashboard.' . session('active_role')) }}" class="flex items-center gap-3 px-3 py-2.5 text-xs font-black uppercase tracking-widest text-navy-900 hover:bg-sand-50 transition-colors">
                            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"></path></svg>
                            Dashboard
                        </a>
                    @endif
                    <a href="{{ route('profile') }}" class="flex items-center gap-3 px-3 py-2.5 text-xs font-black uppercase tracking-widest text-navy-900 hover:bg-sand-50 transition-colors">
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path></svg>
                        Profil Saya
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-xs font-black uppercase tracking-widest text-navy-900 hover:bg-sand-50 transition-colors">
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"></path></svg>
                        Riwayat Pesanan
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
