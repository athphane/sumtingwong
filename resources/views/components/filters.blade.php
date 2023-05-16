<div class="mb-3">
    <form class="flex items-center justify-between" action="{{ route('sumtingwongs.index') }}" method="GET">

        <div class="flex items-end gap-5">
            <div>
                <label for="orderBy" class="block mb-2 text-sm font-medium text-gray-900">
                    {{ __('Order By') }}
                </label>
                <select id="orderBy" name="orderBy"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">{{ __('No options selected') }}</option>
                    <option value="severity"
                            @selected(Request::get('orderBy') === 'severity')
                    >{{ __('Severity') }}</option>
                </select>
            </div>

            <button
                class="block rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition
                hover:bg-indigo-700 focus:outline-none focus:ring">
                {{ __('Filter') }}
            </button>
        </div>

        @if(Request::has('orderBy'))
            <div>
                <a href="{{ route('sumtingwongs.index') }}"
                   class="block rounded-lg hover:text-white bg-transparent border border-indigo-600 px-5 py-2.5 mt-6
                   text-sm font-medium text-gray-800 transition hover:bg-indigo-700 focus:outline-none focus:ring">
                    {{ __('Clear Filters') }}
                </a>
            </div>
        @endif

    </form>
</div>
