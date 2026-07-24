@props(['histories'])

<div class="flow-root">
    <ul role="list" class="-mb-8">
        @foreach($histories as $index => $history)
            <li>
                <div class="relative pb-8">
                    @if($index !== count($histories) - 1)
                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-sand-300" aria-hidden="true"></span>
                    @endif
                    <div class="relative flex space-x-3">
                        <div>
                            <span class="h-8 w-8 rounded-full bg-teal-500 flex items-center justify-center ring-8 ring-white text-white">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </span>
                        </div>
                        <div class="flex-1 min-w-0 pt-1.5 flex justify-between space-x-4">
                            <div>
                                <p class="text-sm font-semibold text-navy-800">
                                    Status: <x-status-badge :status="$history->status" />
                                </p>
                                @if($history->note)
                                    <p class="text-xs text-sand-600 mt-1 italic">{{ $history->note }}</p>
                                @endif
                            </div>
                            <div class="text-right text-xs whitespace-nowrap text-sand-500">
                                <time datetime="{{ $history->created_at }}">{{ $history->created_at->format('d M Y H:i:s') }}</time>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
