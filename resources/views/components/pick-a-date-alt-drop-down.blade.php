<div>

    {{-- A template for none input dropwdown menu for date picker --}}
    <div class="flex-shrink-0">
        {{-- <label id="listbox-label" class="sr-only"> Assign </label> --}}
        <div class="relative" x-data="selectDueDate({
            open:false,
            picker:'',
            project_date:null,
            selecteddate: null,
            dateactiveIndex: 0,
            date:$persist(@entangle('date')),

        })">
            @error('date')
            <span class="inline-flex px-2 py-2 text-sm text-red-500">{{ $message }}</span>
            @enderror
            <button x-on:click="open = ! open" type="button" id="datebutton"
                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 rounded-full whitespace-nowrap bg-gray-50 hover:bg-gray-100 sm:px-3"
                aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label" x-ref="button"
                x-on:click="$dispatch('input', project_date)" x-data x-ref="button" x-init="new Pikaday({
                    field: $refs.button,
                    onSelect: function(){
                        date = this.getMoment().format('MM/DD/YYYY');
                        $dispatch('input', date);

                    },
                })"

                >
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-gray-300 sm:-ml-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>

                <span class="hidden truncate sm:ml-2 sm:block"
                    x-text="date != null ? date : 'Select Due Date' ">
                </span>

            </button>




        </div>
    </div>
</div>
