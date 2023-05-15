<x-sumtingwong::layout>
    <div>
        <div class="px-4 sm:px-0">
            <h3
                @class([
                    'text-base font-semibold leading-7 text-gray-900' => true,
                    'text-red-500' => $sumtingwong->severity === 'high',
                ])>
                {{ __('Report :id', ['id' => $sumtingwong->id]) }}
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">{{ __('Reported at :reported_at', ['reported_at' => $sumtingwong->created_at->format('d M Y - H:i:s')]) }}</p>
        </div>
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Severity') }}</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <span
                            @class([
                                'inline-flex items-center justify-center rounded-full' => true,
                                'px-2.5 py-1' => true,
                                'font-medium' => true,
                                'bg-green-100 text-green-700' => $sumtingwong->severity === 'low',
                                'bg-yellow-100 text-yellow-700' => $sumtingwong->severity === 'medium',
                                'bg-red-100 text-red-700' => $sumtingwong->severity === 'high',
                            ])>
                            <p class="whitespace-nowrap text-sm">{{ $sumtingwong->severity }}</p>
                        </span>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('User') }}</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $sumtingwong->formatted_user }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('IP') }}</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $sumtingwong->ip }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Route') }}</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $sumtingwong->route }}</dd>
                </div>

                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Description') }}</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $sumtingwong->description }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Actions</dt>
                    <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex space-x-2">
                            <button class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">{{ __('Mark as Addressed') }}</button>
                            <a href="{{ route('sumtingwongs.index') }}" class="px-4 py-2 bg-slate-500 text-white rounded-md hover:bg-slate-600">{{ __('Go Back') }}</a>
                        </div>

                    </dd>
                </div>
            </dl>
        </div>
    </div>

</x-sumtingwong::layout>
