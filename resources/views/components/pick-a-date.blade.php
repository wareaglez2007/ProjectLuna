<div>
    @props(['options' => "{dateFormat:'Y-m-d H:i:s', altFormat:'Y-m-d H:i:s', altInput:true,enableTime: true,minDate:'today',
    } ", 'error' => null,])
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <div class="flex-shrink-0">
        <label id="listbox-label" class="sr-only"> Pick a Due Date </label>
        <div class="relative" x-data="selectduedateDropDown({
            open: false,
            selectedIndex: 0,
            activeIndex: 0,
            selectoption:null,
            optionOne:'No Due Date',
            optionTwo: 'Select Due Date',
            due_date_options:[
                {id:1, name: 'Select Due Date'},
                {id:2, name: 'No Due Date'},

            ],
            due_date_selector:@entangle('due_date_options'),
    })" x-init="init()" >
    @error('temp_data.due_date')
    <span class="inline-flex px-2 py-2 text-sm text-red-500">{{ $message }}</span>
    @enderror
            <button type="button" x-on:click="open = ! open" x-cloak
                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 rounded-full whitespace-nowrap bg-gray-50 hover:bg-gray-100 sm:px-3"
                aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">

                <svg class="flex-shrink-0 w-5 h-5 text-gray-300 sm:-ml-1" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                        clip-rule="evenodd" />
                </svg>
                <span class="hidden truncate sm:ml-2 sm:block"
                :class="{ '': selectoption === null, 'text-gray-900': !(selectoption === null) }"
                x-text="due_date_selector != null ? due_date_selector : (selectoption === null ? 'No Due Date' : selectoption) "></span>
            </button>


            <ul x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute right-0 z-10 py-3 mt-1 overflow-auto text-base bg-white rounded-lg shadow w-52 max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-0"
                x-show="open" x-cloak @click.outside="open = false"
                wire:model="due_date_options"
                x-cloak
                >




                    <li class="relative px-3 py-2 cursor-default select-none" id="listbox-option-0"
                        role="option" x-data
                        @click="$dispatch('input', optionOne), selectoption = 'optionOne', open=false, onChangeOption()"
                        @mouseenter="activeIndex = optionOne"
                        @mouseleave="activeIndex = activeIndex"

                        :class="(due_date_selector != null ? (activeIndex === due_date_selector ? 'bg-gray-100' : 'bg-white') : (activeIndex === optionOne) ? 'bg-gray-100' : 'bg-white')">

                        <div class="flex items-center">

                            <span class="block ml-3 font-medium truncate" x-text="optionOne">

                            </span>

                        </div>
                    </li>

                <li class="relative px-3 py-2 cursor-default select-none" id="listbox-option-0"
                    role="option"

                    @click="$dispatch('input', optionTwo), selectoption = 'optionTwo', open=true, onChangeOption()"
                    @mouseenter="activeIndex = optionTwo"
                    @mouseleave="activeIndex = activeIndex"
                    :class="(due_date_selector != null ? (activeIndex === due_date_selector ? 'bg-gray-100' : 'bg-white') : (activeIndex === optionTwo) ? 'bg-gray-100' : 'bg-white')">


                </li>


                <!-- More items... -->
            </ul>
        </div>
    </div>


</div>
