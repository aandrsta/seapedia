@props([
    'title' => '',
    'highlight' => '',
    'description' => '',
    'type' => 'simple', // 'simple' or 'hero'
])

@if($type === 'hero')
    <div class="bg-sand-200 text-black pt-16 pb-12 relative overflow-hidden animate-cinematic">
        <div class="absolute inset-0 dot-pattern-dark opacity-50"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight mb-4">
                {{ $title }} @if($highlight)<span class="text-teal-400">{{ $highlight }}</span>@endif
            </h1>
            @if($description)
                <p class="text-sm text-sand-600 max-w-2xl font-medium mt-3 leading-relaxed">
                    {{ $description }}
                </p>
            @endif
        </div>
    </div>
@else
    <div class="mb-12 text-left animate-cinematic">
        <h1 class="text-4xl sm:text-5xl font-black tracking-tight mb-4">
            {{ $title }} @if($highlight)<span class="text-teal-400">{{ $highlight }}</span>@endif
        </h1>
        @if($description)
            <p class="text-sm text-sand-500 font-medium mt-3 max-w-lg leading-relaxed">
                {{ $description }}
            </p>
        @endif
    </div>
@endif
