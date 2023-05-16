<div class="my-3">
    <form class="flex items-center justify-between" action="{{ route('sumtingwongs.index') }}" method="GET">

        <div class="flex items-end gap-5">
            <div>
                <label for="orderBy" class="block text-sm font-medium leading-6 text-gray-900">Order By</label>
                <div class="mt-2">

                  <select name="orderBy" class="block w-full rounded-md border-0 py-2.5 text-gray-900 shadow-sm text-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                    <option value="">No options selected</option>
                    <option value="severity">Severity</option>
                  </select>
                </div>
              </div>

              <div>
                <button class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring">Filter</button>
              </div>

        </div>

      @if(Request::has('orderBy'))
      <div>
        <a href="{{ route('sumtingwongs.index') }}" class="block rounded-lg hover:text-white bg-transparent border border-indigo-600 px-5 py-3 text-sm font-medium text-gray-800 transition hover:bg-indigo-700 focus:outline-none focus:ring">Clear Filters</a>
      </div>
      @endif

    </form>
</div>
