<footer class="bg-navy-900 text-white border-t border-navy-800 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 pb-8 border-b border-navy-800">
            <!-- Left Side: Brand Wordmark -->
            <div class="space-y-3">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-0.5">
                    <span class="font-black text-3xl tracking-tighter text-teal-400">SEA</span>
                    <span class="font-light text-3xl tracking-tighter text-white">PEDIA</span>
                </a>
                <p class="text-xs text-sand-400 max-w-sm leading-relaxed font-medium">
                    Portal ekosistem kelautan modern untuk pembeli, penjual merchant kelautan, dan kurir pengiriman.
                </p>
            </div>

            <!-- Right Side: Essential Navigation (Horizontal lists) -->
            <div class="flex flex-wrap gap-x-8 gap-y-3">
                <a href="{{ route('home') }}" class="text-xs font-black uppercase tracking-widest text-sand-300 hover:text-white transition-colors">HOME</a>
                <a href="{{ route('products.index') }}" class="text-xs font-black uppercase tracking-widest text-sand-300 hover:text-white transition-colors">KATALOG</a>
                @auth
                    @if(!auth()->user()->roles->contains('name', 'seller'))
                        <a href="{{ route('select-role') }}" class="text-xs font-black uppercase tracking-widest text-sand-300 hover:text-white transition-colors">BUKA TOKO</a>
                    @endif
                @else
                    <a href="{{ route('register') }}" class="text-xs font-black uppercase tracking-widest text-sand-300 hover:text-white transition-colors">BUKA TOKO</a>
                @endauth
                <a href="https://wa.me/6285156248172" target="_blank" class="text-xs font-black uppercase tracking-widest text-sand-300 hover:text-white transition-colors">HUBUNGI KAMI</a>
            </div>
        </div>

        <!-- Bottom Copyright Row -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 text-[10px] text-navy-400 font-bold uppercase tracking-wider">
            <span>&copy; {{ date('Y') }} SEAPEDIA. ALL RIGHTS RESERVED.</span>
            <span>MADE WITH ❤ FOR COMPFEST 18</span>
        </div>
    </div>
</footer>
