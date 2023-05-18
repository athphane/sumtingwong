<x-sumtingwong::layout>
    <div class="overflow-x-auto">
        @if($sumtingwongs->isEmpty())
            <x-sumtingwong::empty/>
        @else
            <x-sumtingwong::filters/>
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm table-auto">
                <thead class="text-left">
                <tr>
                    <th class="px-4 py-2">
                        <span class="sr-only">{{ __('Actions') }}</span>
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                        {{ __('Reported At') }}
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                        {{ __('Severity') }}
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                        {{ __('Client IP') }}
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                        {{ __('Route') }}
                    </th>
                    <th class="px-4 py-2">
                        <span class="sr-only">{{ __('Actions') }}</span>
                    </th>
                </tr>
                </thead>


                <tbody class="divide-y divide-gray-200">
                @foreach($sumtingwongs as $sumtingwong)
                    <tr>
                        <td>
                            @if($sumtingwong->addressed_at == null && $sumtingwong->severity === 'high')
                                <span class="relative flex h-3 w-3 ml-3">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                                </span>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">

                            <div class="flex">

                                {{ $sumtingwong->created_at->format('d M Y H:i:s') }}
                            </div>
                            <span
                                class="text-muted text-slate-400 text-sm">{{ $sumtingwong->created_at->diffForHumans() }}</span>
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                            <span
                                @class([
                                    'inline-flex items-center justify-center rounded-full w-full' => true,
                                    'px-2.5 py-1' => true,
                                    'font-medium' => true,
                                    'bg-green-100 text-green-700' => $sumtingwong->severity === 'low',
                                    'bg-yellow-100 text-yellow-700' => $sumtingwong->severity === 'medium',
                                    'bg-red-100 text-red-700' => $sumtingwong->severity === 'high',
                                ])>
                                <p class="whitespace-nowrap text-sm">{{ $sumtingwong->severity }}</p>
                            </span>
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $sumtingwong->ip }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ \Illuminate\Support\Str::limit($sumtingwong->route, 80) }}</td>
                        <td class="whitespace-nowrap px-4 py-2">
                            <a
                                href="{{ route('sumtingwongs.show', $sumtingwong) }}"
                                class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
                            >
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="my-8">
                {{ $sumtingwongs->links() }}
            </div>
        @endif
    </div>
</x-sumtingwong::layout>
