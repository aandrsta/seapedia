@if(session('success') || session('error') || session('info') || $errors->any())
    <div class="space-y-3 mb-6">
        
        {{-- Success Alert --}}
        @if(session('success'))
            <div x-data="{ show: true }" 
                 x-show="show"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative overflow-hidden bg-gradient-to-r from-emerald-50/90 to-emerald-50/40 border border-emerald-100 border-l-4 border-l-emerald-500 p-4 rounded-[12px] shadow-warm flex items-start justify-between gap-3 animate-cinematic">
                <div class="flex items-start gap-3">
                    <div class="p-1.5 bg-emerald-100 text-emerald-600 rounded-full shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                    </div>
                    <div class="text-sm font-semibold text-emerald-800 mt-1">
                        {{ session('success') }}
                    </div>
                </div>
                <button @click="show = false" class="p-1 rounded-full text-emerald-400 hover:text-emerald-700 hover:bg-emerald-100/50 transition-colors focus:outline-none shrink-0" aria-label="Tutup">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        @endif

        {{-- Error Alert --}}
        @if(session('error'))
            <div x-data="{ show: true }" 
                 x-show="show"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative overflow-hidden bg-gradient-to-r from-coral-50/90 to-coral-50/40 border border-coral-100 border-l-4 border-l-coral-500 p-4 rounded-[12px] shadow-warm flex items-start justify-between gap-3 animate-cinematic">
                <div class="flex items-start gap-3">
                    <div class="p-1.5 bg-coral-100 text-coral-600 rounded-full shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /></svg>
                    </div>
                    <div class="text-sm font-semibold text-coral-800 mt-1">
                        {{ session('error') }}
                    </div>
                </div>
                <button @click="show = false" class="p-1 rounded-full text-coral-400 hover:text-coral-700 hover:bg-coral-100/50 transition-colors focus:outline-none shrink-0" aria-label="Tutup">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        @endif

        {{-- Info Alert --}}
        @if(session('info'))
            <div x-data="{ show: true }" 
                 x-show="show"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative overflow-hidden bg-gradient-to-r from-blue-50/90 to-blue-50/40 border border-blue-100 border-l-4 border-l-blue-500 p-4 rounded-[12px] shadow-warm flex items-start justify-between gap-3 animate-cinematic">
                <div class="flex items-start gap-3">
                    <div class="p-1.5 bg-blue-100 text-blue-600 rounded-full shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.063.852l-.708 2.836a.75.75 0 001.063.852l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <div class="text-sm font-semibold text-blue-800 mt-1">
                        {{ session('info') }}
                    </div>
                </div>
                <button @click="show = false" class="p-1 rounded-full text-blue-400 hover:text-blue-700 hover:bg-blue-100/50 transition-colors focus:outline-none shrink-0" aria-label="Tutup">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        @endif

        {{-- Validation Errors Alert --}}
        @if($errors->any())
            <div x-data="{ show: true }" 
                 x-show="show"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative overflow-hidden bg-gradient-to-r from-coral-50/90 to-coral-50/40 border border-coral-100 border-l-4 border-l-coral-500 p-4 rounded-[12px] shadow-warm flex items-start justify-between gap-3 animate-cinematic">
                <div class="flex items-start gap-3">
                    <div class="p-1.5 bg-coral-100 text-coral-600 rounded-full shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /></svg>
                    </div>
                    <div class="mt-1">
                        <h5 class="text-sm font-bold text-coral-800 mb-1.5">Ada beberapa kesalahan input:</h5>
                        <ul class="list-disc list-inside text-xs text-coral-700 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button @click="show = false" class="p-1 rounded-full text-coral-400 hover:text-coral-700 hover:bg-coral-100/50 transition-colors focus:outline-none shrink-0" aria-label="Tutup">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        @endif
    </div>
@endif
